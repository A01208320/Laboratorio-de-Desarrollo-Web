@extends('layouts.app')

@section('content')
<div class="card-header">
    {{ $review->title->name }}
</div>

<ul class="list-group list-group-flush">
    <li class="list-group-item">
        <p class="card-text">
            <label class="font-weight-bold">
                Plataforma:
            </label>
            {{ $review->title->platform->name }}
        </p>
    </li>

    <li class="list-group-item">
        <p class="card-text">
            <label class="font-weight-bold">
                Edición:
            </label>
            {{ $review->title->edition }}
        </p>
    </li>

    <li class="list-group-item">
        <p class="card-text">
            <label class="font-weight-bold">
                Recomendación:
            </label>
            @if($review->recomendation == '1')
            Recomendado
            @else
            No recomendado
            @endif
        </p>
    </li>
    <li class="list-group-item">
        <label class="font-weight-bold">
            Comentario:
        </label>
        <p class="card-text">
            {{ $review->comment }}
        </p>
    </li>
</ul>
<div class="card-body">
    <a href="{{route('reviews.index')}}" class="card-link">
        <button class="btn btn-primary">
            Regresar
        </button>
    </a>
</div>

@endsection