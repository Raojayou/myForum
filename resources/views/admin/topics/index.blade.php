@extends('admin.layouts.app')

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
                        <th>Id</th>
                        <th>Creador</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Contenido</th>
                        <th>Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($topics as $topic)
                        <tr @if($topic->isMine(Auth::user())) class="table-active" @endif>
                            <th scope="row">{{ $topic->id }}</th>
                            <th>{{ $topic->user->name }}</th>
                            <th>{{ $topic->title }}</th>
                            <th>{{ $topic->category }}</th>
                            <th>{{ $topic->content }}</th>
                            <th><a href="{{ route('topics.edit', ['id' => $topic->id]) }}">Editar</a></th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    {{ $topics->appends(request()->query())->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection