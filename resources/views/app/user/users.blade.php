@extends('app.layout')
@section('app')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Usuários</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF/CNPJ</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th class="text-center">Tipo</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td><strong>{{ $user->name }}</strong> </td>
                                        <td>{{ $user->cpfcnpj }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td class="text-center"><span class="badge bg-label-info me-1">{{ $user->Type }}</span></td>
                                        <td class="text-center">
                                            <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $user->id }}"> <i class="tf-icons bx bx-trash"></i> </button>
                                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $user->id }}"> <i class="tf-icons bx bx-pencil"></i> </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modalDelete{{ $user->id }}" aria-labelledby="modalDelete{{ $user->id }}" tabindex="-1" style="display: none" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('deleteUser') }}" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDelete{{ $user->id }}">Excluir {{ $user->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                                        <div class="mb-3">
                                                            <p>Para confirmar a exclusão, confirme sua senha:</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="password" placeholder="Confirme sua senha:" autofocus/>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                                                        <button type="submit" class="btn btn-success"> Confirmar </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modalUpdate{{ $user->id }}" aria-labelledby="modalUpdate{{ $user->id }}" tabindex="-1" style="display: none" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('updateUser') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalUpdate{{ $user->id }}">Editar {{ $user->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $user->name }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="cpfcnpj" placeholder="CPF ou CNPJ:" value="{{ $user->cpfcnpj }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control phone" name="phone" placeholder="Whatsapp ou Telefone:" value="{{ $user->phone }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="email" class="form-control" name="email" placeholder="Email:" value="{{ $user->email }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password" class="form-control" name="password" placeholder="Senha"/>
                                                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                                                        <button type="submit" class="btn btn-success"> Atualizar Usuário </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
