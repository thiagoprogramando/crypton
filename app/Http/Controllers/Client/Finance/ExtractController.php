<?php

namespace App\Http\Controllers\Client\Finance;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Wallet;
use App\Models\Withdraw;

use Carbon\Carbon;

class ExtractController extends Controller {
    
    public function extract() {

        $withdraws = Withdraw::where('id_user', auth()->id())->get();
        return view('app.finance.extract', ['withdraws' => $withdraws]);
    }

    public function payment(Request $request) {

        $query = Withdraw::query();
        if ($request->input('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->input('user')) {
            $query->where('id_user', $request->input('user'));
        }

        $withdraws = $query->get();
        return view('app.finance.payment', ['withdraws' => $withdraws]);
    }

    public function createWithdraw(Request $request) {

        $password = $request->password;    
        if (Hash::check($password, auth()->user()->password)) {

            $wallet = Wallet::where('id', $request->wallet)->first();
            if($wallet) {

                if($wallet->date_output > now()) {
                    return redirect()->back()->with('infor', 'Resgate disponível apartir de: '.Carbon::parse($wallet->date_output)->format('d/m/Y'));
                }

                if($wallet->invest_output == 0 && $wallet->value_profitability < $this->formatarValor($request->value)) {
                    return redirect()->back()->with('infor', 'Valor disponível: R$ '.number_format($wallet->value_profitability, 2, ',', '.'));
                }

                if($wallet->invest_output == 1 && ($wallet->value_profitability + $wallet->value) < $this->formatarValor($request->value)) {
                    $sum = $wallet->value + $wallet->value_profitability;
                    return redirect()->back()->with('info', 'Valor disponível: R$ ' .number_format($sum, 2, ',', '.'));
                }

                $withdraw               = new Withdraw();
                $withdraw->name         = 'sac'.auth()->id().rand(0, 568952);
                $withdraw->id_user      = auth()->id();
                $withdraw->id_wallet    = $request->wallet;
                $withdraw->token        = $request->token;
                $withdraw->status       = 'PENDENT';
                $withdraw->value        = $this->formatarValor($request->value);
                $withdraw->data_output  = now();

                if ($wallet->value_profitability >= $this->formatarValor($request->value)) {
                    $wallet->value_profitability -= $this->formatarValor($request->value);
                } else {
                   
                    $remainingValue = $this->formatarValor($request->value) - $wallet->value_profitability;
                    $wallet->value_profitability = 0;
        
                    if ($wallet->value >= $remainingValue) {
                        $wallet->value -= $remainingValue;
                    } else {
                        return redirect()->back()->with('error', 'Não há saldo suficiente para o saque.');
                    }
                }
        
                if ($withdraw->save()) {
                    $wallet->save();
                    return redirect()->route('extract')->with('success', 'Saque solicitado com sucesso!');
                }
                    
                return redirect()->back()->with('error', 'Não foi possível realizar a solicitação. Tente novamente mais tarde!');                        
            }

            return redirect()->back()->with('error', 'Não encontramos dados da Carteira, tente novamente mais tarde!');
        }

        return redirect()->back()->with('error', 'Credenciais inválidas!');
    }

    public function approvedWithdraw(Request $request) {

        $withdraw = Withdraw::find($request->id)->first();
        if($withdraw) {
            $withdraw->status = 'APPROVED';
            $withdraw->save();

            return redirect()->back()->with('success', 'Saque aprovado com sucesso!');
        }

        return redirect()->back()->with('error', 'Não foi possível aprovar essa transação, tente novamente mais tarde!');
    }

    public function deleteWithdraw(Request $request) {

        $password = $request->password;    
        if (Hash::check($password, auth()->user()->password)) {
           
            $withdraw = Withdraw::find($request->id);
            if ($withdraw) {

                if($withdraw->status != 'Pendente') {
                    return redirect()->back()->with('error', 'Não é mais possivel cancelar solicitação!');
                }

                $wallet = Wallet::where('id', $withdraw->id_wallet)->first();
                $wallet->value_profitability += $withdraw->value;
                if($wallet->save()) {
                    $withdraw->delete();
                    return redirect()->back()->with('success', 'Solicitação cancelada com sucesso e o valor foi estornado!');
                }

                return redirect()->back()->with('error', 'Não foi possivel realizar o cancelamento, tente novamente mais tarde!');
            } else {
                return redirect()->back()->with('error', 'Não encontramos dados do Saque, tente novamente mais tarde!');
            }
        } else {
            return redirect()->back()->with('error', 'Senha incorreta!');
        }
    }

    private function formatarValor($valor) {
        
        $valor = preg_replace('/[^0-9,.]/', '', $valor);
        $valor = str_replace(['.', ','], '', $valor);

        return number_format(floatval($valor) / 100, 2, '.', '');
    }
}
