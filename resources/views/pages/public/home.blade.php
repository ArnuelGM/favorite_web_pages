@extends('layouts.public_layout')

@section('page_content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="border p-3">

            <div class="mt-3" style="max-width: 290px">
                @includeWhen(isset($errors), 'components.alerts')
                @includeWhen(session()->has('success'), 'components.alert_success')
            </div>
        </div>
    </div>
@endsection
