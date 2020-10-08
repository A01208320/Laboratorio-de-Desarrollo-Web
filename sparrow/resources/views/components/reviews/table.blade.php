<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Edición</th>
            <th scope="col">Recomendación</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($reviews as $review)
        <tr>
            <td data-col-title="Título">{{ $review->title_name }}</td>
            <td data-col-title="Plataforma">{{ $review->platform_name }}</td>
            <td data-col-title="Edición">{{ $review->edition }}</td>
            <td data-col-title="Recomendación">
                @if($review->recommendation == '1')
                Recomendado
                @else
                No recomendado
                @endif
            </td>
            <td data-col-title="Acciones" class="d-flex justify-content-start align-items-center">
                <a href="{{route('reviews.show', $review)}}" class="p-1">
                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/visibility.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                    </button>
                </a>
                <a href="{{route('reviews.confirm', $review)}}" class="p-1">
                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/delete.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
                    </button>
                </a>
                <a href="{{route('reviews.edit', $review)}}" class="p-1">
                    <button class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/edit.svg')}}" class="icon-white" alt="search" width="17px" height="17px">
                    </button>
                </a>

            </td>
        </tr>

        <tr>
            @empty
            <td colspan="6" class="text-center" data-col-title="Nombre">No hay registros disponibles</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $reviews->links() }}
</div>