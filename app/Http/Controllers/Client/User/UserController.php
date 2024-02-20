<?php

namespace App\Http\Controllers\Client\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;

use GuzzleHttp\Client;

class UserController extends Controller {

    public function logon(Request $request) {

        $credentials = $request->only(['email', 'password']);
        $credentials['password'] = $credentials['password'];
        if (Auth::attempt($credentials)) {
            return redirect()->route('app');
        } else {
            return redirect()->back()->with('error', 'Credenciais inválidas!');
        }
    }

    public function logout() {
        
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile() {

        return view('app.user.profile');
    }

    public function users() {

        $users = User::all();
        return view('app.user.users', [
            'users' => $users
        ]);
    }
    
    public function createUser(Request $request) {

        $rules = [
            'name'      => 'required|string',
            'cpfcnpj'   => 'required|unique:users',
            'email'     => 'required|email|unique:users',
            'phone'     => 'required',
            'password'  => 'required',
        ];

        $messages = [
            'name.required'     => 'Por favor, informe um Nome',
            'cpfcnpj.required'  => 'Por favor, informe um CPF ou CNPJ',
            'cpfcnpj.unique'    => 'Já existe uma conta com esse CPF ou CNPJ',
            'email.required'    => 'Por favor, informe um Email',
            'email.email'       => 'Por favor, informe um Email válido',
            'email.unique'      => 'Já existe uma conta com esse Email',
            'phone.required'    => 'Por favor, informe um WhatsApp ou Telefone',
            'password.required' => 'Por favor, informe uma Senha',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $user           = new User();
        $user->name     = $request->name;
        $user->cpfcnpj  = $request->cpfcnpj;
        $user->phone    = $request->phone;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->type     = 2;
        $user->postal_code  = $request->postal_code;
        $user->street       = $request->street;
        $user->number       = $request->number;
        $user->locality     = $request->city;
        $user->city         = $request->city;
        $user->region       = $request->region;
        $user->save();

        Auth::login($user);
        return redirect()->route('app');
    }

    public function updateUser(Request $request) {

        $user           = User::find($request->id);
        if($user) {
            if($request->name) {
                $user->name = $request->name;
            }
            if($request->password) {
                $user->password = $request->name;
            }
            if($request->cpfcnpj) {
                $user->cpfcnpj = $request->cpfcnpj;
            }
            if($request->phone) {
                $user->phone = $request->phone;
            }
            if($request->email) {
                $user->email = $request->email;
            }
            if($request->password) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
        }

        return redirect()->back()->with('error', 'Encontramos um problema, tente novamente mais tarde!');
    }

    public function deleteUser(Request $request) {

        $password = $request->password;    
        if (Hash::check($password, auth()->user()->password)) {
           
            $user = User::find($request->id);
            if ($user) {

                $user->delete();
                return redirect()->back()->with('success', 'Usuário excluído com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Não encontramos dados do Usuário, tente novamente mais tarde!');
            }
        } else {
            return redirect()->back()->with('error', 'Senha incorreta!');
        }
    }

}
