@extends('layouts.public_layout')

@section('page_content')
    <div class="container">
        <h1 class="mt-5">Bienvenido</h1>
        <div class="row justify-content-center">
            <div class="col-12 mt-5">
                <div class="border p-3">
                    <div class="btn-group mb-3 float-end" role="group" aria-label="Basic example">
                        <a href="{{ route('login.form') }}" class="btn btn-outline-primary">Iniciar Sesión &nbsp;<i class="bi bi-person-check-fill"></i></a>
                        <a href="{{ route('register.form') }}" class="btn btn-outline-primary">Registrarse &nbsp;<i class="bi bi-person-plus-fill"></i></a>
                    </div>
                    @component('components.favorites_table')
                        @slot('favorites', $favorites)
                    @endcomponent
                    <div class="mt-3">
                        @includeWhen(isset($errors), 'components.alerts')
                        @includeWhen(session()->has('success'), 'components.alert_success')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
