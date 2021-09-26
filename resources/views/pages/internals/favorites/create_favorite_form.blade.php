@extends('layouts.internal_layout')

@section('content')
    <h3>Gestión de favoritos</h3>
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <div class="border p-3">
                <form method="POST" action="{{ route('favorite.create') }}">
                    @csrf
                    <h4>Crear favorito</h4>
                    <hr>
                    <div class="mb-3 form-control-sm">
                        <label for="title" class="form-label">Titulo de favorito</label>
                        <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title">
                    </div>
                    <div class="mb-3 form-control-sm">
                        <label for="url" class="form-label">Url</label>
                        <input type="text" class="form-control" value="{{old('url')}}" name="url" id="url">
                    </div>
                    <div class="mb-3 form-control-sm">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                    </div>
                    <div class="mb-3 form-control-sm">
                        <p>Visibilidad</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visibility" id="visibility" value="1">
                            <label class="form-check-label" for="visibility">
                                Publico
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visibility" id="not_visibility" value="0">
                            <label class="form-check-label" for="not_visibility">
                                Privado
                            </label>
                        </div>
                    </div>
                    <hr>
                    @component('components.category_section_for_favorite')
                        @slot('categories', $categories)
                        @slot('categoriesRelated', collect())
                    @endcomponent
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
