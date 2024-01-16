<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;

class AppServiceProvider extends ServiceProvider {
    
    public function register(): void {
        
    }

    public function boot(): void {

        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $products = Product::all();
            $users = User::all();
            $wallets = Wallet::where('id_user', auth()->id())->get();
            $phrases = [
                '"O mercado pode ser volátil, mas a confiança no seu plano de investimento é a âncora que impede que seus ganhos se percam na tempestade."',
                '"Investir não é apenas alocar dinheiro, é a arte de construir um legado financeiro para as gerações futuras."',
                '"Em um mundo de oportunidades, a verdadeira habilidade do investidor está em discernir entre o risco calculado e a mera especulação."',
                '"O risco vem de não saber o que você está fazendo." - Warren Buffett',
                '"Compre quando todo mundo está vendendo e segure até que todos estejam comprando." - John Templeton',
                '"O sucesso nos investimentos não se mede pelo tempo que você está no mercado, mas pelo tempo que você fica no mercado." - Benjamin Graham',
                '"O investimento bem-sucedido é sobre a gestão do risco, não a evitação dele." - Howard Marks',
                '"Ações individuais podem ser emocionantes, mas grupos de ações tornam o dinheiro mais seguro." - Philip Fisher',
                '"Não coloque todos os seus ovos em uma cesta." - Bernard Baruch',
                '"O maior inimigo do investidor é provavelmente ele mesmo." - Benjamin Graham',
            ];

            $view->with(['products' => $products, 'wallets' => $wallets, 'users' => $users, 'phrase' => $phrases[rand(0, 9)]]);
        });
    }
}
