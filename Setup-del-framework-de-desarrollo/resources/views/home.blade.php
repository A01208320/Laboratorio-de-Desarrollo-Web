@extends("layout")

@section("article")
<div class="container">
    <div class="row p-2 d-flex justify-content-center">

        @foreach($autores as $isbn => $autor)
        <div class="col">
            <x-card :isbn="$isbn" :autor="$autor" />
        </div>
        @endforeach
    </div>
</div>
@endsection