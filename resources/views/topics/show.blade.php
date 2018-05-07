@extends('layouts.app')

@section('content')
    <div class="card border-success mb-3 mx-auto" style="max-width: 18rem;">
        <div class="card-header">Título del Tema: {{ $topic['title'] }}</div>
        <div class="card-body">
            <p class="card-text">Contenido del Tema: {{ $topic['content'] }}</p>
        </div>
        <div class="card-footer">
            <p class="card-title">Categoría del Tema: {{ $topic['category'] }}</p>
            {{--<p class="card-text">Añadido por el usuario: {{ $topic->user->nick }}</p>--}}
        </div>
    </div>
@endsection