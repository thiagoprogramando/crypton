@extends('app.layout')
@section('app')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-12">
                <div class="mt-3 mb-3">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opções </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInvest">Investir</a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreateWithdraw">Saque</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-8 mb-4 order-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title text-primary">Crescimento ({{ $product->name }})</h3>
                    </div>
                    <div class="card-body px-0">
                        <div class="tab-content p-0">
                            <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                                <div class="d-flex p-4 pt-3">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <i class="tf-icons bx bx-lg bx-money"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Máx Rendimento</small>
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">{{ $product->max_profitability }}%</h6>
                                            <small class="text-success fw-semibold"> <i class="bx bx-chevron-up"></i> Rentabilizando </small>
                                        </div>
                                    </div>
                                </div>

                                <div id="incomeChartContainer" style="height: 300px;">
                                    <canvas id="incomeChart"></canvas>
                                </div>                                

                                <div class="d-flex justify-content-center pt-4 gap-2">
                                    <div>
                                        <p class="mb-n1 mt-1">{{ $product->name }}</p>
                                        <small class="text-muted">{{ $product->description }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Investimentos</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="bx bx-dots-vertical-rounded"></i> </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreateWithdraw">Saque</a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInvest">Investir</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @foreach ($walletSearch as $wallet)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <i class="tf-icons bx bx-lg bx-wallet"></i>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">{{ $wallet->name }}</small>
                                            <h6 class="mb-0">R$ {{ number_format($wallet->value, 2, ',', '.') }}</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0 text-success">+ {{ number_format($wallet->value_profitability, 2, ',', '.') }}</h6>
                                            <span class="text-success"><i class="bx bx-chevron-up"></i></span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
           
            var labels = ['Jan', 'Fev', 'Mar', 'Abril', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
            var data = @json(array_map('floatval', $profitabilities));
    
            var config = {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Rentabilidade',
                        data: data,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Meses'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Rentabilidade (%)'
                            }
                        }
                    }
                }
            };
    
            var ctx = document.getElementById('incomeChart').getContext('2d');
    
            if (ctx) {
                var myChart = new Chart(ctx, config);
            } else {
                console.error('Elemento canvas não encontrado.');
            }
        });
    </script>
    
@endsection