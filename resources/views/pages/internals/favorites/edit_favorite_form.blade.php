@extends('layouts.internal_layout')

@section('content')
    <h3>Gestión de Favoritos</h3>
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <div class="border p-3">
                <form method="POST" action="{{ route('favorite.edit', ['favoriteID' => $favorite->id]) }}">
                    @csrf
                    <h4>Editar favorito</h4>
                    <hr>
                    <div class="mb-3 form-control-sm">
                        <label for="title" class="form-label">Título de favorito</label>
                        <input type="text" class="form-control" value="{{$favorite->title}}" name="title" id="title">
                    </div>
                    <div class="mb-3 form-control-sm">
                        <label for="url" class="form-label">Url</label>
                        <input type="text" class="form-control" value="{{$favorite->url}}" name="url" id="url">
                    </div>
                    <div class="mb-3 form-control-sm">
                        <label for="description" class="form-label">Descripción</label>
                        <input type="text" class="form-control" value="{{$favorite->description}}" name="description" id="description">
                    </div>
                    <div class="mb-3 form-control-sm">
                        <p>Visibilidad</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visibility" id="visibility" value="1" {{ $favorite->isPublic() ? 'checked' : null }}>
                            <label class="form-check-label" for="visibility">
                                Público
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visibility" id="not_visibility" value="0" {{ $favorite->isPrivate() ? 'checked' : null }}>
                            <label class="form-check-label" for="not_visibility">
                                Privado
                            </label>
                        </div>
                    </div>
                    <hr>
                    <h6>Categorías</h6>
                    <div>
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input
                                    name="categories[]"
                                    class="form-check-input"
                                    type="checkbox"
                                    value="{{ $category->id }}"
                                    id="category_check_{{ $category->id }}"
                                    {{ $category->relatedWithFavorite($categoriesRelated) ? 'checked' : null }}
                                >
                                <label class="form-check-label" for="category_check_{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
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
