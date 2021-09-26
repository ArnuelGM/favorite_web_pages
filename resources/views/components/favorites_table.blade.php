<table id="favorites_table" class="display">
    <thead>
    <tr>
        <th>Titulo</th>
        <th>Url</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($favorites as $favorite)
        <tr>
            <td>{{ $favorite->title }}</td>
            <td>{{ $favorite->url }}</td>
            <td>
                <div class="btn-group mb-3 float-end" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#favorite_modal{{$favorite->id}}"><i class="bi bi-eye"></i></button>
                    @if(auth()->check())
                        <a href="{{ route('favorite.edit.form', ['favoriteID' => $favorite->id]) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('favorite.delete', ['favoriteID' => $favorite->id]) }}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
                    @endif
                </div>
            </td>
            @component('components.favorite_detail')
                @slot('favorite', $favorite)
            @endcomponent
        </tr>
    @endforeach
    </tbody>
</table>

@push('plugins-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
@endpush

@push('page-scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#favorites_table').DataTable({
                "searching": false,
                "ordering": false,
            });
        } );
    </script>
@endpush
