@extends('app.layout')
@section('app')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-lg-12 mb-4 order-0">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">Mantenha seus dados atualizados!</h5>
                                <form id="formAuthentication" class="mb-3" action="{{ route('updateUser') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="{{ Auth::user()->name }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="cpfcnpj" placeholder="{{ Auth::user()->cpfcnpj }}" oninput="mascaraCpfCnpj(this)"/>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="phone" placeholder="{{ Auth::user()->phone }}" oninput="mascaraTelefone(this)"/>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="{{ Auth::user()->email }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Senha"/>
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid w-100" type="submit">Atualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="image-container"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection