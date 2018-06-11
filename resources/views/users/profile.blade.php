@extends('public.layouts.app')

@push('script-head')
    <script src="{{ asset('js/modal.js') }}" defer></script>
    <script src="{{ asset('js/delete.js') }}" defer></script>
@endpush

@section('content')
    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <h2>Administración de temas creados por el usuario {{ Auth::user()->nick }}</h2>
                    </div>

                    <div class="col-md-8">
                        @include('users.topicList')
                    </div>
                </div>
            </div>
        <!-- ROW END -->
        </section>
        <!-- SECTION END -->
    </div>
@endsection