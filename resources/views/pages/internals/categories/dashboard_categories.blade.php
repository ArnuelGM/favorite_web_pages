@extends('layouts.internal_layout')

@section('content')
    <h3>Gestión de categorías</h3>
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <div class="border p-3">

                <div class="mt-3">
                    @includeWhen(isset($errors), 'components.alerts')
                    @includeWhen(session()->has('success'), 'components.alert_success')
                </div>
            </div>
        </div>
    </div>

@endsection
