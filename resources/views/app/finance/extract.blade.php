@extends('app.layout')
@section('app')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-12">
                <div class="mt-3 mb-3">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" id="gerarExcel" class="btn btn-outline-secondary"> <i class="tf-icons bx bx-download"></i> </button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opções </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreateWithdraw">Solicitar Saque</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Solicitações de saque</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="tabela">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Wallet</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Situação</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($withdraws as $key => $withdraw)
                                    <tr>
                                        <td><strong>{{ $withdraw->name }}</strong></td>
                                        <td><span title="{{ $withdraw->wallet->name }}" class="badge bg-label-info me-1">{{ $withdraw->wallet->name }}</span></td>
                                        <td class="text-center">R$ {{ number_format($withdraw->value, 2, ',', '.') }}</td>
                                        <td class="text-center"> {{ \Carbon\Carbon::parse($withdraw->date_output)->format('d/m/Y') }} </td>
                                        <td class="text-center">{{ $withdraw->status }}</td>
                                        <td class="text-center">
                                            @if($withdraw->status == 'Pendente')
                                                <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $withdraw->id }}"> <i class="tf-icons bx bx-trash"></i> </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modalDelete{{ $withdraw->id }}" aria-labelledby="modalDelete{{ $withdraw->id }}" tabindex="-1" style="display: none" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('deleteWithdraw') }}" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDelete{{ $withdraw->id }}">Excluir {{ $withdraw->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $withdraw->id }}">
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

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
