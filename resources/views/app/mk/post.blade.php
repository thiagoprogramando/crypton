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
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreatePost">Criar Post</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Posts</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="tabela">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Tag</th>
                                    <th class="text-center">Visualizações</th>
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <td><strong>{{ $post->title }}</strong> </td>
                                        <td><span title="{{ $post->description }}" class="badge bg-label-info me-1">{{ \Illuminate\Support\Str::limit($post->description, 20, '...') }}</span></td>
                                        <td>{{ $post->tag }}</td>
                                        <td class="text-center">{{ $post->views }}</td>
                                        <td class="text-center">
                                            <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $post->id }}"> <i class="tf-icons bx bx-trash"></i> </button>
                                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalEditPost{{ $post->id }}"> <i class="tf-icons bx bx-pencil"></i> </button>
                                                    <a href="{{ route('viewPost', ['id' => $post->id]) }}" class="btn btn-outline-success"> <i class="tf-icons bx bx-log-in-circle"></i> </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modalDelete{{ $post->id }}" aria-labelledby="modalDelete{{ $post->id }}" tabindex="-1" style="display: none" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('deletePost') }}" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDelete{{ $post->id }}">Excluir {{ $post->title }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $post->id }}">
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

                                    <div class="modal fade" id="modalEditPost{{ $post->id }}" aria-labelledby="modalEditPost{{ $post->id }}" tabindex="-1" style="display: none" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('updatePost') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditPost{{ $post->id }}">Editar {{ $post->title }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <select class="form-select" name="tag">
                                                                <option value="{{ $post->tag }}" selected>{{ $post->tag }}</option>
                                                                <option value="FINANCEIRO">Financeiro</option>
                                                                <option value="INFORMATIVOS">Informativos</option>
                                                                <option value="PUBLICIDADE">Publicidade</option>
                                                                <option value="PATROCÍNIO">Patrocínio</option>
                                                                <option value="MARKETING">Marketing</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile{{ $post->id }}" class="form-label">Escolha uma Capa (Recomendável: 500px X 500px)</label>
                                                            <input class="form-control" type="file" name="file" id="formFile{{ $post->id }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="title" placeholder="Título:" value="{{ $post->title }}" required/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <textarea class="form-control" name="description" rows="5" placeholder="Descrição (legenda)">{{ $post->description }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <textarea class="form-control" id="editor{{ $post->id }}" name="content" rows="15" placeholder="Conteúdo">{{ $post->content }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                                                        <button type="submit" class="btn btn-success"> Atualizar Post </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        ClassicEditor
                                        .create(document.querySelector('#editor{{ $post->id }}'), {
                                            // Editor configuration.
                                        } )
                                        .then( editor => {
                                            window.editor = editor;
                                        } )
                                        .catch( handleSampleError );
                                    </script>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
