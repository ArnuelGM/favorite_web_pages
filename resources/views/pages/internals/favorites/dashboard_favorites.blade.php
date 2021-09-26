@extends('layouts.internal_layout')

@section('content')
    <h3>Gestión de favoritos</h3>
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="border p-3">
                <div class="btn-group mb-3 float-end" role="group" aria-label="Basic example">
                    <a href="{{ route('favorite.create.form') }}" class="btn btn-outline-primary">Crear <i class="bi bi-plus-lg"></i></a>
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
@endsection

