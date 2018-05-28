@extends('layouts.app')

@section('content')
    @push('script-head')
        <script src="{{ asset('js/validationForm.js') }}" defer></script>
    @endpush

    <div class="container">
        <div class="row">
            <button id="load" type="submit" class="btn btn-primary mx-auto">
                {{ __('Cargar datos') }}
            </button>

            <button id="loadOne" type="submit" class="btn btn-primary ">
                {{ __('Cargar uno a uno los datos') }}
            </button>
        </div>

        <a href="{{ url('/data/dataAjax') }}">
            {{ __('Recargar la página') }}
        </a>


        <div id="topicList"></div>
    </div>
@endsection