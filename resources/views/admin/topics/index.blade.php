@extends('admin.layouts.app')

@push('script-head')
    <script src="{{ asset('js/modal.js') }}" defer></script>
    <script src="{{ asset('js/delete.js') }}" defer></script>
@endpush

@section('content')
    <div class="container">
        <div class="row main-area">
            <div class="col-md-3">
                @include('admin.partials.main_admin_panel_nav')
            </div>
            <div class="col-md-9">
                <nav aria-label="Page navigation example">
                    {{ $topics->appends(request()->query())->links() }}
                </nav>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Acciones</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Fecha de creación</th>
                    </tr>
                    </thead>
                    @foreach($topics as $topic)
                        <tbody>
                        <tr id="topic{{$topic->id}}">
                            <td>
                                <a class="btn btn-default btn-outline-dark"
                                   href="{{ url('/') }}/topics/edit/{{ $topic['id'] }}"><i
                                            class="fa fa-pencil text-success"></i> Editar</a>

                                <!-- Trigger the modal with a button -->
                                <button name="btnModal" data-idTopic="{{$topic->id}}" type="button"
                                        class="btn btn-default btn-outline-dark"
                                        data-toggle="modal">
                                    <i class="fa fa-remove text-danger"></i> Borrar
                                </button>
                                <!-- Modal -->

                            </td>

                            <td>
                                <a href="/topics/{{$topic->id }}">{{$topic->title}}</a>
                            </td>

                            <td>
                                {{$topic->created_at}}
                            </td>
                        </tr>

                        @endforeach

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

                                        <button id="enviar" type="submit"
                                                class="btn btn-success btn-default pull-center"
                                                data-idTopicEnviar="">
                                            <i class="fas fa-chevron-right text-light"></i> Aceptar
                                        </button>
                                        <!-- </form>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($topics->isEmpty())
                            <p>El usuario no ha creado ningún tema todavía.</p>
                            <a class="btn btn-info" href="{{ url('/topics/create') }}">
                                <i class="fas fa-plus text-light"></i> Añadir Tema</a>
                        @endif
                        <p></p>
                        </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                {{ $topics->appends(request()->query())->links() }}
            </nav>

        </div>
    </div>
@endsection