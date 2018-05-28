@extends('layouts.app')

@section('content')
    @push('script-head')
        <script src="{{ asset('js/validationForm.js') }}" defer></script>
    @endpush

    <div class="container">
        <div class="row">
            <button id="load" type="submit" class="btn btn-success mx-2">
                {{ __('Cargar datos') }}
            </button>

            <a class="btn btn-info mx-auto" href="{{ url('/data/dataAjax') }}">
                {{ __('Recargar la página') }}
            </a>

            <button id="loadOne" type="submit" class="btn btn-warning mx-5">
                {{ __('Cargar uno a uno los datos') }}
            </button>
        </div>
        <br>
        <div id="topicList"></div>
    </div>
@endsection