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
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreateProfitability">Gerar Rentabilidade</a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalFilterProfitability">Filtrar Rentabilidade</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Rendimentos</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="tabela">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Processo</th>
                                    <th class="text-center">Porcentagem</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($profitabilitys as $key => $profitability)
                                    <tr>
                                        <td><strong>{{ $profitability->product->name }}</strong></td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($profitability->dateProfitability)->format('d/m/Y') }}</td>
                                        <td class="text-center">{{ $profitability->process }}</td>
                                        <td class="text-center">{{ $profitability->percentage }}%</td>
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
