@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 35px">
        <div class="page-header page-heading">
            <h1 class="pull-left">Foro</h1>
            <ol class="breadcrumb pull-right where-am-i">
                <li class="active">Buscador <i class="fa fa-search fa-1x"></i></li>
            </ol>
            <div class="clearfix"></div>
        </div>

        <p>
            Este es el lugar adecuado para discutir ideas, críticas, solicitudes de funciones y todas las ideas con
            respecto a nuestro sitio web. Siga las reglas del foro y siempre consulte las preguntas frecuentes antes
            de publicar para evitar duplicar publicaciones
        </p>

        <table class="table forum table-striped">
            <thead>
            <tr>
                <th class="cell-stat"></th>
                <th>
                    <h3><i class="fa fa-exclamation-triangle fa-1x text-warning"></i> Importante</h3>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
                <td>
                    <h5><a href="#">Preguntas Frecuentes</a><br>
                        <small>
                            Aquí puede encontrar respuestas a preguntas sobre cómo funciona el foro. Utilice los
                            enlaces a continuación o el cuadro de búsqueda de arriba para encontrar lo que esté
                            buscando.
                        </small>
                    </h5>
                </td>
            </tr>
            <tr>
                <td class="text-center"><i class="fa fa-exclamation fa-2x text-danger"></i></td>
                <td>
                    <h5><a href="#">Reglas & Pautas</a><br>
                        <small>
                            Aprenda las políticas del foro y otra información relacionada.
                        </small>
                    </h5>
                </td>
            </tr>
            </tbody>

            <thead>
            <tr>
                <th class="cell-stat"></th>
                <th>
                    <h3><i class="fa fa-comments fa-1x text-info"></i> Discusión General</h3>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center"><i class="fa fa-edit fa-2x text-success"></i></td>
                <td colspan="4" class="center">
                    <h5><a href="{{ url('/topics/{topic}') }}">Mostrar Temas</a><br>

                        <small>
                            Haga click para ser redireccionado a la página de mostrar temas.
                        </small>
                    </h5>

                    @auth()
                        <h5><a href="{{ url('/topics/create') }}">Añadir Tema</a><br>

                            <small>
                                Haga click para ser redireccionado a la página de añadir tema.
                            </small>
                        </h5>
                    @endauth

                    {{--@include('topics.topic')--}}

                    {{--@forelse($topics->chunk(3) as $chunk)--}}
                    {{--<div class="row course-set courses__row event d-flex justify-content-around topic">--}}
                    {{--@foreach($chunk as $topic)--}}
                    {{--@include('topics.topic')--}}
                    {{--@endforeach--}}
                    {{--</div>--}}
                    {{--<br>--}}
                    {{--@empty--}}
                    {{--<p>No hay temas añadidos todavía.</p>--}}
                    {{--@endforelse--}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <footer>
        <div class="container">
            <span class="text-muted">
                <p>Encuentranos en nuestras redes sociales.
                    <a href="https://www.twitter.com/Raojayou1">
                        <i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com">
                        <i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/Raojayoulol">
                        <i class="fa fa-instagram"></i></a>
                    <a href="https://www.youtube.com/user/Raojayou">
                        <i class="fa fa-youtube"></i></a>
                </p>
            </span>
        </div>
    </footer>

    {{--<div class="pagination">--}}
    {{--{{ $topics->links('pagination::bootstrap-4') }}--}}
    {{--</div>--}}
@endsection