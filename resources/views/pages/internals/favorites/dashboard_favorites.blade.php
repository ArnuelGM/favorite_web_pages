@extends('layouts.internal_layout')

@section('content')
    <h3>Gestión de favoritos</h3>
    <div class="row justify-content-center">
        <div class="col-12 mt-5">

            <div class="border p-3">

                <div class="btn-group mb-3 float-end" role="group" aria-label="Basic example">
                    <a href="{{ route('favorite.create.form') }}" class="btn btn-outline-primary">Crear <i class="bi bi-plus-lg"></i></a>
                </div>
                <table id="favorites_table" class="display">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Url</th>
                        <th>Descripción</th>
                        <th>Visibilidad</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($favorites as $favorite)
                        <tr>
                            <td>{{ $favorite->title }}</td>
                            <td>{{ $favorite->url }}</td>
                            <td>{{ $favorite->description }}</td>
                            <td>{{ $favorite->visibilityLabel }}</td>
                            <td>
                                <div class="btn-group mb-3 float-end" role="group" aria-label="Basic example">
                                    <a href="{{ route('category.edit.form', ['categoryID' => $favorite->id]) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('favorite.delete', ['favoriteID' => $favorite->id]) }}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    @includeWhen(isset($errors), 'components.alerts')
                    @includeWhen(session()->has('success'), 'components.alert_success')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugins-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
@endpush

@push('page-scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#favorites_table').DataTable({
                "searching": false
            });
        } );
    </script>
@endpush
