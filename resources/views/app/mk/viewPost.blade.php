@extends('app.layout')
@section('app')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-12">
                <div class="mt-3 mb-3">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Filtros </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{ route('blog', ['tag' => '']) }}">Todos</a>
                                <a class="dropdown-item" href="{{ route('blog', ['tag' => 'FINANCEIRO']) }}">Financeiro</a>
                                <a class="dropdown-item" href="{{ route('blog', ['tag' => 'INFORMATIVOS']) }}">Informativos</a>
                                <a class="dropdown-item" href="{{ route('blog', ['tag' => 'PUBLICIDADE']) }}">Publicidade</a>
                                <a class="dropdown-item" href="{{ route('blog', ['tag' => 'PATROCÍNIO']) }}">Patrocínio</a>
                                <a class="dropdown-item" href="{{ route('blog', ['tag' => 'MARKETING']) }}">Marketing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ $post->tag }}</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        {!! $post->content !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
