@extends('layouts.internal_layout')

@section('content')
    <h3>Gestión de categorías</h3>
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <div class="border p-3">
                <form method="POST" action="{{ route('category.create') }}">
                    @csrf
                    <h4>Crear Categoría</h4>
                    <hr>
                    <div class="mb-3 form-control-sm">
                        <label for="name" class="form-label">Nombre de categoría</label>
                        <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name">
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
                <div class="mt-3">
                    @includeWhen(isset($errors), 'components.alerts')
                </div>
            </div>
        </div>
    </div>

@endsection
