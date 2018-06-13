<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card" style="width: 35rem;">
                    <div class="card-body">
                        <div class="panel-heading">{{ __('Creación de Respuesta') }}</div>
                        <hr>
                        <div class="panel-body">
                            <form id="form" action="/topics/{{ $topic->id }}/replies" method="POST"
                                  class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="content"
                                           class="col-md-5 control-label">{{ __('Contenido de la Respuesta') }}</label>
                                    <div class="col-md-9">
                                            <textarea id="content" name="content" class="form-control"
                                                      placeholder="Escribe lo que necesites..."  rows="5"
                                                      autofocus required>{{ old('content') }}</textarea>
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
                                            {{ __('Añadir Respuesta') }}
                                        </button>
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