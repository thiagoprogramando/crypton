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
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreateProduct">Criar Produto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Produtos</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="tabela">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Descrição</th>
                                    <th class="text-center">Mín. Rendimento</th>
                                    <th class="text-center">Max. Rendimento</th>
                                    <th class="text-center">Mín. Valor</th>
                                    <th class="text-center">Max. Valor</th>
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td><strong>{{ $product->name }}</strong> </td>
                                        <td><span title="{{ $product->description }}" class="badge bg-label-info me-1">{{ \Illuminate\Support\Str::limit($product->description, 20, '...') }}</span></td>
                                        <td class="text-center">{{ $product->min_profitability }}%</td>
                                        <td class="text-center">{{ $product->max_profitability }}%</td>
                                        <td class="text-center">R$ {{ number_format($product->min_value, 2, ',', '.') }}</td>
                                        <td class="text-center">R$ {{ number_format($product->max_value, 2, ',', '.') }}</td>
                                        <td class="text-center">
                                            <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $product->id }}"> <i class="tf-icons bx bx-trash"></i> </button>
                                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalEditProduct{{ $product->id }}"> <i class="tf-icons bx bx-pencil"></i> </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modalDelete{{ $product->id }}" aria-labelledby="modalDelete{{ $product->id }}" tabindex="-1" style="display: none" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('deleteProduct') }}" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDelete{{ $product->id }}">Excluir {{ $product->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
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

                                    <div class="modal fade" id="modalEditProduct{{ $product->id }}" aria-labelledby="modalEditProduct{{ $product->id }}" tabindex="-1" style="display: none" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('updateProduct') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditProduct{{ $product->id }}">Editar {{ $product->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $product->name }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="description" placeholder="Descrição:" value="{{ $product->description }}"/>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <textarea class="form-control" name="terms" rows="3" placeholder="Termos de Investimento:" required>{{ $product->terms }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="min_profitability" placeholder="Rendimento Mín:" value="{{ $product->min_profitability }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="max_profitability" placeholder="Rendimento Max:" value="{{ $product->max_profitability }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="min_value" placeholder="Valor Mín para Investimento" value="{{ $product->min_value }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="max_value" placeholder="Valor Max para investimento" value="{{ $product->max_value }}"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="number" class="form-control" name="days_output" placeholder="Dias para retirar" minlength="1" value="{{ $product->days_output }}" required/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <select class="form-select" name="invest_output" required>
                                                                <option value="{{ $product->invest_output }}" selected>Sobre a retirada do valor investido:</option>
                                                                <option value="0">Apenas os redimentos</option>
                                                                <option value="1">Rendimentos & Investimento</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                                                        <button type="submit" class="btn btn-success"> Atualizar Produto </button>
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
