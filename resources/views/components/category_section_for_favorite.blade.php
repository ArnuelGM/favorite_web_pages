<div>
    <h6>
        <a href="{{ route('category.create') }}" title="crear categoría"><i class="bi bi-plus-circle"></i></a>
        Categorías
        @if($categories->isEmpty())
            <small class="text-muted float-end">debe crear al menos una categoría!</small>
        @endif
    </h6>

</div>
<div>
    @foreach($categories as $category)
        <div class="form-check">
            <input
                name="categories[]"
                class="form-check-input"
                type="checkbox"
                value="{{ $category->id }}"
                id="category_check_{{ $category->id }}"
            >
            <label class="form-check-label" for="category_check_{{ $category->id }}">
                {{ $category->name }}
            </label>
        </div>
    @endforeach
</div>
