@extends("layout")
@section("article")
<div class="container">
    <div class="row">

        @foreach($autores as $isbn => $autor)
        <div class="col">
            <x-card :isbn="$isbn" :autor="$autor" />
        </div>
        @endforeach

    </div>
</div>
@endsection