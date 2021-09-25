@extends('layouts.internal_layout')

@section('content')
    <h3>Gestión de categorías</h3>
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <div class="border p-3">
                <form method="POST" action="{{ route('category.edit', ['categoryID' => $category->id]) }}">
                    @csrf
                    <h4>Editar Categoría</h4>
                    <hr>
                    <div class="mb-3 form-control-sm">
                        <label for="name" class="form-label">Nombre de categoría</label>
                        <input type="text" class="form-control" value="{{$category->name}}" name="name" id="name">
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
                <div class="mt-3">
                    @includeWhen(isset($errors), 'components.alerts')
                </div>
            </div>
        </div>
    </div>

@endsection
