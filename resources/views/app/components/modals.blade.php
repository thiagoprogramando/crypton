
<div class="modal fade" id="modalInvest" aria-labelledby="modalInvest" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('createWallet') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInvest">Criar Carteira de Investimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select" name="product">
                            <option selected>Escolha uma opção de Investimento:</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="value" oninput="mascaraReal(this)" placeholder="Quanto deseja investir:"/>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="payment">
                            <option selected>Como deseja pagar:</option>
                            <option value="PIX">Pix</option>
                            <option value="WALLET">Carteira</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <small>Ao clicar em Investir você concorda com os termos de aplicação, rentabilidade e gestão financeira do Produto escolhido.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-target="#modalTerms" data-bs-toggle="modal" data-bs-dismiss="modal"> Leia os termos </button>
                    <button type="submit" class="btn btn-success"> Investir </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTerms" aria-hidden="true" aria-labelledby="modalTerms" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTerms">Termos e condições</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="accordion mt-3" id="accordionExample">
                    @foreach ($products as $product)
                    
                        <div class="card accordion-item">
                            <h2 class="accordion-header" id="heading">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion{{ $product->id }}" aria-expanded="false" aria-controls="accordionOne"> {{ $product->name }} </button>
                            </h2>
        
                            <div id="accordion{{ $product->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="divider divider-success">
                                        <div class="divider-text">Termos e Condições</div>
                                    </div>
                                    <p> {{ $product->terms }} </p>
                                    <p> Rendimento míx: {{ $product->min_profitability }}% | Rendimento Max: {{ $product->max_profitability }}% </p>
                                    <p> Investimento míx: R$ {{ number_format($product->min_value, 2, ',', '.') }} | Investimento Max: R$ {{ number_format($product->max_value, 2, ',', '.') }} </p>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-bs-target="#modalInvest" data-bs-toggle="modal" data-bs-dismiss="modal"> Retornar </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCreateProduct" aria-labelledby="modalCreateProduct" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('createProduct') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateProduct">Criar Produto Para Investimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nome:" autofocus required/>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="description" placeholder="Descrição:" required/>
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control" name="terms" rows="3" placeholder="Termos de Investimento:" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="min_profitability" oninput="mascaraPorcentagem(this)" placeholder="Rendimento Mín:"/>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="max_profitability" oninput="mascaraPorcentagem(this)" placeholder="Rendimento Max:"/>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="min_value" oninput="mascaraReal(this)" placeholder="Valor Mín para Investimento"/>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="max_value" oninput="mascaraReal(this)" placeholder="Valor Max para investimento"/>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="days_output" placeholder="Dias para retirar" minlength="1" required/>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="invest_output" required>
                            <option selected>Sobre a retirada do valor investido:</option>
                            <option value="0">Apenas os redimentos</option>
                            <option value="1">Rendimentos & Investimento</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                    <button type="submit" class="btn btn-success"> Criar Produto </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCreateWithdraw" aria-labelledby="modalCreateWithdraw" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('createWithdraw') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateWithdraw">Solicitar Saque</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select" name="wallet">
                            <option selected>Escolha uma Carteira:</option>
                            @foreach ($wallets as $wallet)
                                <option value="{{ $wallet->id }}">{{ $wallet->name }} | Redimento: {{ $wallet->value_profitability }} | Aplicação: {{ $wallet->value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="value" oninput="mascaraReal(this)" placeholder="Quanto deseja resgatar:"/>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="token" placeholder="Informe uma Carteira ou Chave Pix:"/>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Confirme sua senha:"/>
                    </div>
                    <div class="mb-3">
                        <small>Transações podem levar até 48h para serem atendidas. <br> Verifique suas informações antes de solicitar.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                    <button type="submit" class="btn btn-success"> Solicitar Saque </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFilterWithdraw" aria-labelledby="modalFilterWithdraw" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('payment') }}" method="GET">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFilterWithdraw">Filtrar Solicitações</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select" name="user">
                            <option {{ Request::input('user') == '' ? 'selected' : '' }} value="">Todos os usuários</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="status">
                            <option {{ Request::input('status') == '' ? 'selected' : '' }} value="">Todas às situações</option>
                            <option {{ Request::input('status') == 'PENDENT' ? 'selected' : '' }} value="PENDENT">Pendente</option>
                            <option {{ Request::input('status') == 'APPROVED' ? 'selected' : '' }} value="APPROVED">Aprovado</option>
                            <option {{ Request::input('status') == 'DENIED_WITHDRAWAL_UNAVAILABLE' ? 'selected' : '' }} value="DENIED_WITHDRAWAL_UNAVAILABLE">Indisponível para saque</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                    <button type="submit" class="btn btn-success"> Filtrar Solicitações </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCreateProfitability" aria-labelledby="modalCreateProfitability" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('createProfitability') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateProfitability">Gerar Rentabilidade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select" name="product" required>
                            <option selected>Escolha um Produto:</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="percentage" oninput="mascaraPorcentagem(this)" placeholder="Qual a porcentagem do rendimento (%):" required/>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Confirme sua senha:" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                    <button type="submit" class="btn btn-success"> Investir </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCreatePost" aria-labelledby="modalCreatePost" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('createPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreatePost">Criar Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select" name="tag">
                            <option selected>Escolha uma Tag:</option>
                            <option value="FINANCEIRO">Financeiro</option>
                            <option value="INFORMATIVOS">Informativos</option>
                            <option value="PUBLICIDADE">Publicidade</option>
                            <option value="PATROCÍNIO">Patrocínio</option>
                            <option value="MARKETING">Marketing</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Escolha uma Capa (Recomendável: 500px X 500px)</label>
                        <input class="form-control" type="file" name="file" id="formFile" />
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Título:" required/>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="description" rows="5" placeholder="Descrição (legenda)"></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control editor" name="content" rows="15" placeholder="Conteúdo"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                    <button type="submit" class="btn btn-success"> Criar </button>
                </div>
            </form>
        </div>
    </div>
</div>