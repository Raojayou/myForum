@extends('admin.layouts.app')

@push('script-head')
    <script src="{{ asset('js/validationForm.js') }}" defer></script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="card" style="width: 35rem;">
                        <div class="card-body">
                            <div class="panel-heading">{{ __('Edición de Tema') }}</div>
                            <hr>
                            <div class="panel-body">
                                <form id="form" action="{{ url('/') }}/topics/edit/{id}" method="POST"
                                      class="form-horizontal">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label for="title"
                                               class="col-md-4 control-label">{{ __('Título del Tema') }}</label>
                                        <div class="col-md-9">
                                            <input id="title" name="title" type="text" class="form-control"
                                                   value="{{ old('title') }}" autofocus>
                                            <div>
                                                @if($errors->has('title'))
                                                    @foreach($errors->get('title') as $message)
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                            <label for="category"
                                                   class="col-md-4 control-label">{{ __('Categoría del Tema') }}</label>
                                            <div class="col-lg-9">
                                                <select id="category" name="category" class="custom-select"
                                                        title="Categoría del Tema">
                                                    <option selected value="">Ninguno seleccionado</option>
                                                    <option value="Discusión General">Discusión General</option>
                                                    <option value="Juegos en General">Juegos en General</option>
                                                    <option value="Software & Hardware">Software & Hardware</option>
                                                    <option value="Cine, Música & Televisión">Cine, Música &
                                                        Televisión
                                                    </option>
                                                    <option value="Anime, Manga & Cómics">Anime, Manga & Cómics
                                                    </option>
                                                    <option value="Eventos">Eventos</option>
                                                    <option value="Xbox">Xbox</option>
                                                    <option value="PS4">PS4</option>
                                                    <option value="PC Gaming">PC Gaming</option>
                                                    <option value="Reporte de Errores">Reporte de Errores</option>
                                                </select>

                                                <div>
                                                    @if($errors->has('category'))
                                                        @foreach($errors->get('category') as $message)
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <label for="content"
                                                   class="col-md-4 control-label">{{ __('Contenido') }}</label>
                                            <div class="col-md-9">
                                            <textarea id="content" class="form-control"
                                                      placeholder="Escribe lo que necesites..." name="content" rows="5"
                                                      autofocus></textarea>
                                                <div>
                                                    @if($errors->has('content'))
                                                        @foreach($errors->get('content') as $message)
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button id="enviar" type="submit" class="btn btn-primary">
                                                    {{ __('Editar Tema') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection