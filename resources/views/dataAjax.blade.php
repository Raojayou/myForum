@extends('layouts.app')

@section('content')
    @push('script-head')
        <script src="{{ asset('js/loadData.js') }}" defer></script>
    @endpush

    <div class="container">
        <div class="row">
            <button id="enviar" type="submit" class="btn btn-primary">
                {{ __('Cargar datos') }}
            </button>
        </div>

        <div id="response"></div>
    </div>
@endsection