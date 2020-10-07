<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Edición</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($titles as $title)
        <tr>
            <td data-col-title="Nombre">{{ $title->name }}</td>
            <td data-col-title="Plataforma">{{ $title->platform_name }}</td>
            <td data-col-title="Edición">{{ $title->edition }}</td>
            <td data-col-title="Estado">
                @if($title->state == '1')
                Aprobado
                @else
                Pendiente
                @endif
            </td>
            <td data-col-title="Acciones" class="d-flex justify-content-start align-items-center">
                @if($title->state == '0')
                <a href="{{route('titles.edit', $title)}}" class="p-1">
                    <button class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/check.svg')}}" class="icon-white" alt="search" width="17px" height="17px">
                    </button>
                </a>
                @endif
                <a href="{{route('titles.edit', $title)}}" class="p-1">
                    <button class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/edit.svg')}}" class="icon-white" alt="search" width="17px" height="17px">
                    </button>
                </a>
                <a href="{{route('titles.confirm', $title)}}" class="p-1">
                    <button type="button" class="btn btn-primary btn-circle btn-sm">
                        <img src="{{ asset('img/icons/delete.svg')}}" class="icon-white" alt="search" width="20px" height="20px">
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
    {{ $titles->links() }}
</div>