@extends('layouts.app')

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
        {{--<div class="col-md-4">--}}
        {{--<div id="imagen">--}}
        {{--<img src="../images/user-icon.png" width="160px" height="160px" class="img-rounded img-responsive" alt="Imagen Plantilla">--}}
        {{--</div>--}}
        {{--<br><br>--}}
        {{--<label>Cambiar Nick</label>--}}
        {{--<input type="text" class="form-control" placeholder="{{ Auth::user()->nick }}">--}}
        {{--<label>Cambiar Nombre</label>--}}
        {{--<input type="text" class="form-control" placeholder="{{ Auth::user()->name }}">--}}
        {{--<label>Cambiar Email</label>--}}
        {{--<input type="text" class="form-control" placeholder="{{ Auth::user()->email }}">--}}
        {{--<br>--}}
        {{--<a href="#" class="btn btn-success">Editar información</a>--}}
        {{--<br><br>--}}
        {{--</div>--}}
        <!-- ROW END -->
        </section>
        <!-- SECTION END -->
    </div>
@endsection