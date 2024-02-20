@extends('layout')
@section('app')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                
                <div class="card">
                    <div class="card-body">
                        
                        <div class="app-brand justify-content-center">
                            <a href="{{ route('login') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">A.Z.U.R.I.T.A</span>
                            </a>
                        </div>
                        
                        <h4 class="mb-2">Bem-vindo(a)! 👋</h4>
                        <p class="mb-4">Preencha todas às informações para cadastrar-se.</p>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif

                        <form id="formAuthentication" class="mb-3" action="{{ route('createUser') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Nome:" autofocus/>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="cpfcnpj" placeholder="CPF ou CNPJ:" oninput="mascaraCpfCnpj(this)"/>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control phone" name="phone" placeholder="Whatsapp ou Telefone:" oninput="mascaraTelefone(this)"/>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email:"/>
                            </div>
                            <div class="mb-3">
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Senha"/>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" onblur="consultaCEP()" name="postal_code" placeholder="CEP:" required/>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="street" placeholder="Endereço:"/>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="city" placeholder="Cidade:"/>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="region" placeholder="Estado:"/>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="number" placeholder="N°:" required/>
                            </div>
                            <div class="mb-3">
                                <button id="btn-registrer" class="btn btn-primary d-grid w-100" type="submit">Cadastrar-me</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Já possui conta?</span>
                            <a href="{{ route('login') }}"> <span>Acesse sua conta</span> </a>
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
