@extends('layouts.internal_layout')

@section('content')
    <h3>Gestión de categorías</h3>
    <div class="row justify-content-center">
        <div class="col-6 mt-5">

            <div class="border p-3">

                <div class="btn-group mb-3 float-end" role="group" aria-label="Basic example">
                    <a href="{{ route('category.create.form') }}" class="btn btn-outline-primary">Crear <i class="bi bi-plus-lg"></i></a>
                </div>
                <table id="categories_table" class="display">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="btn-group mb-3 float-end" role="group" aria-label="Basic example">
                                    <a href="{{ route('category.edit.form', ['categoryID' => $category->id]) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{ route('category.delete', ['categoryID' => $category->id]) }}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
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
            $('#categories_table').DataTable({
                "searching": false
            });
        } );
    </script>
@endpush
