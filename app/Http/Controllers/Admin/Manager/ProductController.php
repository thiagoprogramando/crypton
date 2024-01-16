<?php

namespace App\Http\Controllers\Admin\Manager;

use App\Http\Controllers\Controller;

use App\Models\Product;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function product($page = null) {

        $perPage = 20;
        $pages = max(1, ceil(Product::count() / $perPage));

        $page = $page != null ? $page : 1;
        $offset = ($page - 1) * $perPage;

        $products = Product::offset($offset)->limit($perPage)->get();
        return view('app.profitability.product', [
            'products' => $products,
            'pages'    => $pages
        ]);
    }

    public function createProduct(Request $request) {

        $product                    = new Product();
        $product->name              = $request->name;
        $product->description       = $request->description;
        $product->terms             = $request->terms;
        $product->min_profitability = $request->min_profitability;
        $product->max_profitability = $request->max_profitability;
        $product->min_value         = $this->formatarValor($request->min_value);
        $product->max_value         = $this->formatarValor($request->max_value);
        $product->days_output       = $request->days_output;
        $product->invest_output     = $request->invest_output;

        if ($product->save()) {
            return redirect()->back()->with('success', 'Produto criado com sucesso!');
        }
    
        return redirect()->back()->with('error', 'Encontramos um problema, tente novamente mais tarde!');
    }

    public function updateProduct(Request $request) {

        $product                    = Product::find($request->id);
        if (!$product) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }
        
        $product->name              = $request->name;
        $product->description       = $request->description;
        $product->terms             = $request->terms;
        $product->min_profitability = $request->min_profitability;
        $product->max_profitability = $request->max_profitability;
        $product->min_value         = $this->formatarValor($request->min_value);
        $product->max_value         = $this->formatarValor($request->max_value);
        $product->days_output       = $request->days_output;
        $product->invest_output     = $request->invest_output;

        if ($product->save()) {
            return redirect()->back()->with('success', 'Produto criado com sucesso!');
        }
    
        return redirect()->back()->with('error', 'Encontramos um problema, tente novamente mais tarde!');
    }

    public function deleteProduct(Request $request) {

        $password = $request->password;    
        if (Hash::check($password, auth()->user()->password)) {
           
            $product = Product::find($request->id);
            if ($product) {

                $product->delete();
                return redirect()->back()->with('success', 'Produto excluído com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Não encontramos dados do Produto, tente novamente mais tarde!');
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
