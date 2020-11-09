<table class="table smart-table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Release</th>
            <th scope="col">Summary</th>

        </tr>
    </thead>
    <tbody>
        @forelse($games as $game)
        <tr>
            <td data-col-title="Nombre">{{ $game->name }}</td>
            <td data-col-title="Nombre"> {{ \Carbon\Carbon::parse($game->first_release_date)->format('j-M-y')}}</td>
            <td data-col-title="Nombre">{{ $game->summary }}</td>
        </tr>
        <tr>
            @empty
            <td colspan="6" class="text-center" data-col-title="Nombre">No hay registros disponibles</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $games->links() }}
</div>