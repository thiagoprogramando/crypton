<?php

namespace App\Http\Controllers\Client\App;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Wallet;

class AppController extends Controller {
    
    public function app($id = null) {
        if ($id) {
            $product = Product::with(['profitabilities' => function ($query) { $query->whereYear('dateProfitability', now()->year); }])->find($id);
        } else {
            $product = Product::inRandomOrder()->with(['profitabilities' => function ($query) { $query->whereYear('dateProfitability', now()->year); }])->first();
        }

        if($product) {
            $walletSearch = Wallet::where('id_user', auth()->id())->where('id_product', $product->id)->get();
            $profitabilities = $product->profitabilities->pluck('percentage')->map(function ($percentage) { return (float) $percentage; })->toArray();

            return view('app.app', [
                'product' => $product,
                'walletSearch' => $walletSearch,
                'profitabilities' => $profitabilities,
            ]);
        }
    
        return redirect()->route('blog');
    }    
    
}
