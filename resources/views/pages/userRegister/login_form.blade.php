@extends('layouts.public_layout')

@section('page_content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="border p-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                    <h3>Ingreso</h3>

                <hr>
                <div class="mb-3 form-control-sm">
                    <label for="email" class="form-label">Usuario</label>
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3 form-control-sm">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </form>
            <div class="mt-3" style="max-width: 290px">
                @includeWhen(isset($errors), 'components.alerts')
            </div>
        </div>
    </div>
@endsection
