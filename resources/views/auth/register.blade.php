@extends('layouts.app')

@section('content')

    @push('script-head')
        <script src="{{ asset('js/validation.js') }}" defer></script>
    @endpush

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro de Usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div id="validateName">
                                <div class="form-group row">

                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" required autofocus>

                                        <div id="errorName" class="text-danger"></div>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div id="validateNick">
                                    <div class="form-group row">
                                        <label for="nick"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>

                                        <div class="col-md-6">

                                            <input id="nick" type="text"
                                                   class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}"
                                                   name="nick" value="{{ old('nick') }}" required autofocus>
                                            <div id="errorNick" class="text-danger"></div>
                                            @if ($errors->has('nick'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div id="validateEmail">
                                        <div class="form-group row">
                                            <label for="email"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Dirección de E-Mail') }}</label>

                                            <div class="col-md-6">

                                                <input id="email" type="email"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       name="email" value="{{ old('email') }}" required>
                                                <div id="errorEmail" class="text-danger"></div>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div id="validatePassword">
                                            <div class="form-group row">
                                                <label for="password"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                                <div class="col-md-6">

                                                    <input id="password" type="password"
                                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                           name="password" required>
                                                    <div id="errorPassword" class="text-danger"></div>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button id="enviar" type="submit" class="btn btn-primary">
                                                        {{ __('Registrar') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
