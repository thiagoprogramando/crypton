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
                                <a class="dropdown-item" href="{{ route('wallet', ['year' => '']) }}">Visão Geral</a>
                                <a class="dropdown-item" href="{{ route('wallet', ['year' => '2024']) }}">Filtrar 2024</a>
                                <a class="dropdown-item" href="{{ route('wallet', ['year' => '2025']) }}">Filtrar 2025</a>
                                <a class="dropdown-item" href="{{ route('wallet', ['year' => '2026']) }}">Filtrar 2026</a>
                                <a class="dropdown-item" href="{{ route('wallet', ['year' => '2027']) }}">Filtrar 2027</a>
                                <a class="dropdown-item" href="{{ route('wallet', ['year' => '2028']) }}">Filtrar 2028</a>
                                <a class="dropdown-item" href="{{ route('wallet', ['year' => '2029']) }}">Filtrar 2029</a>
                                <a class="dropdown-item" href="{{ route('wallet', ['year' => '2030']) }}">Filtrar 2030</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-sm-12 col-lg-8">
                                        <div class="text-center fw-semibold pt-3 mb-2">
                                            <h5 class="text-nowrap mb-2">{{ $product->name }}</h5>
                                            {{ $product->lastEarningPercentage($year) }}% Último Rendimento | {{ $product->countWallets($year) }} Investimentos
                                        </div>
                                        <div class="d-flex px-xxl-3 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <small>Total Investido</small>
                                                    <h6 class="mb-0">R$ {{ number_format($product->totalWallets($year), 2, ',', '.') }} </h6>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="me-2">
                                                    <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <small>Pag Mín</small>
                                                    <h6 class="mb-0">R$ {{ number_format($product->minPayment($year), 2, ',', '.') }} </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-4">
                                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                <div class="card-title">
                                                    
                                                </div>
                                                <div class="text-center fw-semibold pt-3 mb-2">
                                                    <h5 class="text-nowrap mb-2"><span class="badge bg-label-warning rounded-pill">Período {{ $year }}</span></h5>
                                                </div>
                                                <div class="mt-sm-auto">
                                                    <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> {{ $product->maxProfitabilityPercentage($year) }}% Maior rendimento</small>
                                                    <h3 class="mb-0">R$ {{ number_format($product->totalValue($year), 2, ',', '.') }} </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
