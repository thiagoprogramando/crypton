<?php

namespace App\Http\Controllers\Admin\Finance;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductProfitability;
use App\Models\Wallet;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProductWalletController extends Controller {
    
    public function wallet($year = null) {

        return view('app.wallet.wallet', ['year' => $year]);
    }

    public function profitability() {

        $profitabilitys = ProductProfitability::all();

        return view('app.profitability.profitability', [
            'profitabilitys' => $profitabilitys
        ]);
    }

    public function createProfitability(Request $request) {

        $password = $request->password;    
        if (!Hash::check($password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Senha incorreta!');
        }

        try {
            $product = Product::findOrFail($request->product);
            $wallets = Wallet::where('id_product', $product->id)->where('status', 1)->get();
    
            $wallets->each(function ($wallet) use ($request, $product) {
                $percentage = $wallet->value * ($request->percentage / 100);
                $wallet->update(['value_profitability' => $wallet->value_profitability + $percentage]);
            });
    
            ProductProfitability::create([
                'id_product' => $product->id,
                'dateProfitability' => now(),
                'process' => 'CONCLUÍDO',
                'percentage' => $request->percentage,
            ]);
    
            return redirect()->back()->with('success', 'Rentabilidade gerada com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao processar a rentabilidade.');
        }
    }
}
