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

                    <a class="btn btn-default btn-outline-dark" href="{{ url('/') }}/topics/delete/{{ $topic['id'] }}"><i
                                class="fa fa-remove text-danger"></i> Borrar</a>
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

            @if (session('deleted'))
                <div class="alert alert-danger">
                    {{ session('deleted') }}
                </div>
            @endif
        </tbody>
    </table>
</div>