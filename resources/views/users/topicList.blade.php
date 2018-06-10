<div>
    @foreach($topics as $topic)
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Tema</th>
                <th scope="col">Fecha de creación</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>
                    <a class="btn btn-default btn-outline-dark" href="{{ url('/') }}/topics/edit/{{ $topic['id'] }}"><i
                                class="fa fa-pencil text-success"></i> Editar</a>

                    <!-- Trigger the modal with a button -->
                    <button id="myBtn" type="button" class="btn btn-default btn-outline-dark" data-toggle="modal"
                            data-target="#exampleModal">
                        <i class="fa fa-remove text-danger"></i> Borrar
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <!-- Modal header-->
                                <h2 class="modal-header" style="padding:35px 50px;">
                                    Confirmar borrado de tema
                                </h2>
                                <!-- Modal body-->
                                <div class="modal-body text-center">
                                    <p>
                                        ¿Está seguro de querer borrar este tema?
                                    </p>
                                </div>
                                <!-- Modal footer-->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger btn-default pull-center"
                                            data-dismiss="modal">
                                        <i class="fa fa-remove text-light"></i> Cancelar
                                    </button>

                                    <form action="/topics/delete/{{ $topic->id }}" method="post">
                                        <input type="hidden" name="_method" value="delete"/>
                                        {!! csrf_field() !!}
                                        <button id="enviar" type="submit" class="btn btn-success btn-default pull-center">
                                            <i class="fas fa-chevron-right text-light"></i> Continuar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <a href="/topics/{{$topic->id }}">{{$topic->title}}</a>
                </td>

                <td>
                    {{$topic->created_at}}
                </td>
            </tr>

            @endforeach

            @if($topics->isEmpty())
                <p>El usuario no ha creado ningún tema todavía.</p>
                <a class="btn btn-info" href="{{ url('/topics/create') }}">
                    <i class="fas fa-plus text-light"></i> Añadir Tema</a>
            @endif
            <p></p>
            @if (session('deleted'))
                <div class="alert alert-danger">
                    {{ session('deleted') }}
                </div>
            @endif
            </tbody>
        </table>
</div>