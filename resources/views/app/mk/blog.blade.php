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

                <h5 class="pb-1 mb-4">Publicações</h5>
                    <div class="row mb-5">
                        @foreach ($posts as $post)
                            <div class="col-md-6" onclick="window.location.href='{{ route('viewPost', ['id' => $post->id]) }}'">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img class="card-img card-img-left" src="{{ url("storage/{$post->img}") }}" alt="Card image" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">
                                                    {{ $post->description }}
                                                </p>
                                                <p class="card-text"><small class="text-muted">{{ $post->tag }}</small></p>
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
    </div>
@endsection
