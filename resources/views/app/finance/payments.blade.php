@extends('app.layout')
@section('app')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-12">
                <div class="mt-3 mb-3">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" onclick="window.print()" class="btn btn-outline-secondary"> <i class="tf-icons bx bx-download"></i> </button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opções </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{ route('payments', ['status' => '2']) }}">Pendentes</a>
                                <a class="dropdown-item" href="{{ route('payments', ['status' => '1']) }}">Aprovados</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Faturas</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="tabela">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Situação</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($walletPayments as $key => $wallet)
                                    <tr>
                                        <td><strong>{{ $wallet->id }}</strong></td>
                                        <td><strong>{{ $wallet->name }}</strong></td>
                                        <td><strong>@if($wallet->status == 1) Aprovado @else Pendente @endif  </strong></td>
                                        <td class="text-center">R$ {{ number_format($wallet->value, 2, ',', '.') }}</td>
                                        <td class="text-center"> {{ \Carbon\Carbon::parse($wallet->date_create_at)->format('d/m/Y') }} </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <a href="{{ $wallet->url }}" target="_blank" class="btn btn-outline-danger"> <i class="tf-icons bx bx-credit-card"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
