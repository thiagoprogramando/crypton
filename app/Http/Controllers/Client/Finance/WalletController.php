<?php

namespace App\Http\Controllers\Client\Finance;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Wallet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client;

class WalletController extends Controller {

    public function payments($status) {

        $walletPayments = Wallet::where('status', $status)->get();
        return view('app.finance.payments', ['walletPayments' => $walletPayments]);
    }

    public function createWallet(Request $request) {

        $rules = $this->rulesInvest($request);
        if($rules['code'] == 'success') {

            $wallet = $this->wallet($request);
            if($wallet) {
                return redirect()->route('payments', ['status' => 2])->with('success', 'Carteira criada com sucesso! Após a confirmação de pagamento seu produto será válido.');
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

        if($product->min_value != 0 && ($this->formatarValor($request->value) < $product->min_value)) {
            $result['message'] = 'O valor mín para investimento é: R$ '.$product->min_value;
            $result['code'] = 'error';
            return $result;
        }
        
        if($product->max_value != 0 && ($this->formatarValor($request->value) > $product->max_value)) {
            $result['message'] = 'O valor max para investimento é: R$ '.$product->max_value;
            $result['code'] = 'error';
            return $result;
        }
    
        $invest = Wallet::where('id_product', $product->id)->sum('value');
        if($product->max_value != 0 && ($invest + $this->formatarValor($request->value)) > $product->max_value) {
            $rest = $product->max_value - $invest;
            $result['message'] = 'Você já investiu: R$ '.$invest.', restando apenas R$ '.$rest.' disponível para investimentos nessa opção.';
            $result['code'] = 'infor';
            return $result;
        }
    
        return $result;
    }

    private function wallet($request) {

        $product = Product::find($request->product);

        $charge = $this->createCharge($request->billingType, $request->value);
        if($charge) {

            $wallet                         = new Wallet();
            $wallet->id_user                = auth()->id();
            $wallet->id_product             = $product->id;
            $wallet->name                   = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $product->name));
            $wallet->status                 = 2;
            $wallet->value                  = $this->formatarValor($request->value);
            $wallet->value_profitability    = 0;
            $wallet->date_output            = now()->addDay($product->days_output);
            $wallet->invest_output          = $product->invest_output;
            $wallet->token                  = $charge['id'];
            $wallet->url                    = $charge['bankSlipUrl'];
            if ($wallet->save()) {
                return true;
            }
        }

        return false;
    }

    private function createCharge($billingType, $value, ) {

        $client = new Client();

        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'access_token' => env('API_KEY_ASSAS'),
            ],
            'json' => [
                'customer'          => auth()->user()->custumer,
                'billingType'       => $billingType,
                'value'             => $value > 80 ? $value - 1 : $value,
                'dueDate'           => now()->addDay(),
                'description'       => 'CCB AZURITA',
            ],
            'verify' => false
        ];

        $response = $client->post(env('API_URL_ASSAS') . 'v3/payments', $options);
        $body = (string) $response->getBody();

        if ($response->getStatusCode() === 200) {
            $data = json_decode($body, true);
            return $dados['json'] = [
                'id'            => $data['id'],
                'bankSlipUrl'    => $data['bankSlipUrl'],
            ];
        } else {
            return "Erro!";
        }
    }

    private function formatarValor($valor) {
        
        $valor = preg_replace('/[^0-9,.]/', '', $valor);
        $valor = str_replace(['.', ','], '', $valor);

        return number_format(floatval($valor) / 100, 2, '.', '');
    }

    public function webhook(Request $request) {
        $jsonData = $request->json()->all();
        
        if ($jsonData['event'] === 'PAYMENT_CONFIRMED' || $jsonData['event'] === 'PAYMENT_RECEIVED') {
            
            $token = $jsonData['payment']['id'];

            $wallet = Wallet::find($token);
            $wallet->status = 1;
            $wallet->save();

            return response()->json(['status' => 'success', 'message' => 'Requisição tratada!']);
        }

        return response()->json(['status' => 'success', 'message' => 'Webhook não utilizado!']);
    }
    
}
