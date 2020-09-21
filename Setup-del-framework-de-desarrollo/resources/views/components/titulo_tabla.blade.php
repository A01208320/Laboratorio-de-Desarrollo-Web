<table class="table">
    <thead class="thead text-white bg-secondary">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Edición</th>
            <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($titulos as $titulo)
        <tr>
            <th scope="row">{{ $titulo["titulo_nombre"] }}</th>
            <td>{{ $titulo["plataforma_id"] }}</td>
            <td>{{ $titulo["titulo_edicion"] }}</td>
            <td>{{ $titulo["titulo_estado"] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>