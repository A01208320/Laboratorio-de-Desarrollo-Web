@extends("layout")
@section("article")
<div class="container">
    <div class="row p-2 d-flex justify-content-center">
        <div class="col">
            <x-titulo_tabla :titulos="$titulos" />
        </div>
    </div>
</div>
@endsection