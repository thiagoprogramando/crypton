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
                        <p class="mb-4">Faça login para ter acesso aos beneficios da sua conta.</p>

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-3" action="{{ route('logon') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="email" placeholder="Seu Email:" autofocus/>
                            </div>
                            <div class="mb-3">
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Senha"/>
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Lembrar meus dados </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Acessar</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Novo na plataforma?</span>
                            <a href="{{ route('registrer') }}"> <span>Crie sua conta</span> </a>
                        </p>

                        <p class="text-center"> 
                            <a href="{{ route('forgout-password') }}"> <small>Esqueceu a senha?</small> </a>
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
