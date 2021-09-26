<!-- favorite detail modal -->
<div class="modal fade" id="favorite_modal{{$favorite->id}}" tabindex="-1" aria-labelledby="favorite_modal_label_{{$favorite->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Detalle Favorito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$favorite->title}}</h5>
                        <p class="card-text">{{$favorite->description}}</p>
                    </div>
                    <div class="card-body border-top">
                        <h6 class="card-title">Categorías</h6>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($favorite->categoriesRelated as $categoryRelated)
                            @php($category = $categoryRelated->category)
                            <li class="list-group-item">
                                <span class="badge bg-secondary">{{ $category->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
