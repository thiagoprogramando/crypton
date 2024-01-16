<?php

namespace App\Http\Controllers\Client\Finance;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller {

    public function createWallet(Request $request) {

        $rules = $this->rulesInvest($request);
        if($rules['code'] == 'success') {

            $wallet = $this->wallet($request);
            if($wallet) {
                return redirect()->back()->with('success', 'Carteira criada com sucesso!');
            }
        }

        return redirect()->back()->with($rules['code'], $rules['message']);
    }

    private function rulesInvest($request) {

        $result = [
            'code' => 'success',
        ];
    
        $product = Product::find($request->product);
        if(!$product) {
            $result['message'] = 'Opção de investimento não encontrada ou disponível';
            $result['code'] = 'error';
            return $result;
        }

        if($product->min_value && ($this->formatarValor($request->value) < $product->min_value)) {
            $result['message'] = 'O valor mín para investimento é: R$ '.$product->min_value;
            $result['code'] = 'error';
            return $result;
        }
        
        if($product->max_value && ($this->formatarValor($request->value) > $product->max_value)) {
            $result['message'] = 'O valor max para investimento é: R$ '.$product->max_value;
            $result['code'] = 'error';
            return $result;
        }
    
        $invest = Wallet::where('id_product', $product->id)->sum('value');
        if($product->max_value && ($invest + $this->formatarValor($request->value)) > $product->max_value) {
            $rest = $product->max_value - $invest;
            $result['message'] = 'Você já investiu: R$ '.$invest.', restando apenas R$ '.$rest.' disponível para investimentos nessa opção.';
            $result['code'] = 'infor';
            return $result;
        }
    
        return $result;
    }

    private function wallet($request) {

        $product = Product::find($request->product);

        $wallet                         = new Wallet();
        $wallet->id_user                = auth()->id();
        $wallet->id_product             = $product->id;
        $wallet->name                   = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $product->name.'-'.$request->payment));
        $wallet->status                 = 1;
        $wallet->value                  = $this->formatarValor($request->value);
        $wallet->value_profitability    = 0;
        $wallet->date_output            = now()->addDay($product->days_output);
        $wallet->invest_output          = $product->invest_output;
        if ($wallet->save()) {
            return true;
        }

        return false;
    }

    private function formatarValor($valor) {
        
        $valor = preg_replace('/[^0-9,.]/', '', $valor);
        $valor = str_replace(['.', ','], '', $valor);

        return number_format(floatval($valor) / 100, 2, '.', '');
    }
    
}
