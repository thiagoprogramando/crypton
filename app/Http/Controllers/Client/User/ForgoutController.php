<?php

namespace App\Http\Controllers\Client\User;

use App\Http\Controllers\Controller;

use App\Mail\Forgout;
use App\Models\Code;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgoutController extends Controller {

    public function index($code = null) {

        return view('forgout-password', ['code' => $code]);
    }

    public function forgout(Request $request) {

        $user = User::where('email', $request->email)->first();
        if($user) {

            $codeStr = Str::random(10);
            $code = new Code();
            $code->id_user = $user->id;
            $code->code = $codeStr;
            if($code->save()) {
                Mail::to($user->email, $user->name)->send(new Forgout([
                    'toName'    => $user->name,
                    'toCode'    => $codeStr,
                    'fromName'  => 'Suporte - Ifuture',
                    'fromEmail' => 'suporte@ifuture.cloud',
                    'subject'   => 'RECUPERAÇÃO DE CREDENCIAIS',
                    'message'   => 'Esqueuceu algo? Não tem problema, estamos aqui para te ajudar!'
                ]));

                return redirect()->back()->with('success', 'Confira seu Email!');
            }   

            return redirect()->back()->with('error', 'Tivemos um pequeno problema, tente novamente mais tarde!');
        } else {
            return redirect()->back()->with('error', 'Verifique seu email e tente novamente!');
        }
    }

    public function newPassword(Request $request) {

        if($request->password != $request->passwordRepeat) {
            return redirect()->back()->with('error', 'Às senhas não coincidem');
        }

        $code = Code::where('code', $request->code)->first();
        if($code) {

            $user           = User::find($code->id_user);
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->route('login')->with('success', 'Dados atualizados!');
        } 

        return redirect()->back()->with('error', 'Nenhum código associado!');
    }

}
