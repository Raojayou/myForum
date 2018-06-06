@extends('layouts.app')

@section('content')
    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
            <div class="row">
                <div class="col-md-4">
                    <div id="imagen">
                        <img src="../images/user-icon.png" width="160px" height="160px" class="img-rounded img-responsive" alt="Imagen Plantilla">
                    </div>
                    <br><br>
                    <label>Cambiar Nick</label>
                    <input type="text" class="form-control" placeholder="{{ Auth::user()->nick }}">
                    <label>Cambiar Nombre</label>
                    <input type="text" class="form-control" placeholder="{{ Auth::user()->name }}">
                    <label>Cambiar Email</label>
                    <input type="text" class="form-control" placeholder="{{ Auth::user()->email }}">
                    <br>
                    <a href="#" class="btn btn-success">Editar información</a>
                    <br><br>
                </div>
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <h2>{{ Auth::user()->nick }}</h2>
                        <p>
                            Añada una bio para que otros usuarios puedan verla.
                        </p>
                    </div>
                    <br>
                    <div class="form-group col-md-8 col-auto">
                        <h3>Cambiar la contraseña</h3>
                        <br>
                        <label>Introduzca la contraseña antigua</label>
                        <input type="password" class="form-control">
                        <label>Introduzca la contraseña nueva</label>
                        <input type="password" class="form-control">
                        <label>Reintroduzca la contraseña nueva</label>
                        <input type="password" class="form-control">
                        <br>
                        <a href="#" class="btn btn-warning">Cambiar contraseña</a>
                    </div>
                </div>
            </div>
            <!-- ROW END -->
        </section>
        <!-- SECTION END -->
    </div>
@endsection