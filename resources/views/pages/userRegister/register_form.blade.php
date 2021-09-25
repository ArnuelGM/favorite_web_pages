@extends('layouts.public_layout')

@section('page_content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="border p-3">
            <form method="POST" action="{{ route('create.register') }}">
                @csrf
                    <h3>Regístrese Aquí</h3>
                <hr>
                <div class="mb-3 form-control-sm">
                    <label for="name" class="form-label">Nombre y Apellido</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name">
                </div>
                <div class="mb-3 form-control-sm">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">ingrese un correo que no se encuentre registrado</div>
                </div>
                <div class="mb-3 form-control-sm">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3 form-control-sm">
                    <label for="password2" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="password2" id="password2">
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
                <a href="{{ route('login.form') }}">Ingresar</a>
            </form>
            <div class="mt-3" style="max-width: 290px">
                @includeWhen(isset($errors), 'components.alerts')
            </div>
        </div>
    </div>
@endsection
