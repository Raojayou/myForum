@extends('public.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <p>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                           aria-expanded="false"
                           aria-controls="collapseExample">
                            <i class="fa fa-eye text-light"></i> Mostrar datos del tema
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample">
                        <div class="card-header">
                            <p class="card-text font-weight-bold">Título del Tema:</p> {{ $topic['title'] }}
                        </div>

                        <div class="card-body">
                            <p class="card-text font-weight-bold">Contenido del tema:</p> {{ $topic['content'] }}
                        </div>

                        <div class="card-footer">
                            <p class="card-text"><a class="font-weight-bold">Categoría del Tema:</a><br>
                                {{ $topic['category'] }}</p>
                            <p class="card-text font-weight-bold">Fecha de Creación:</p> {{ $topic['created_at'] }}
                            <p class="card-text font-weight-bold">Etiquetas</p> @include('public.partials.tags')
                        </div>
                        <hr>
                        @include('public.partials.replies')
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection