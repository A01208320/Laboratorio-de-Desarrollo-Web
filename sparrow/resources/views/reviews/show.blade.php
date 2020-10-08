@extends('layouts.app')

@section('content')

<div class="row mt-4 p-2 d-flex justify-content-center align-items-center">
    <div class="col-10 col-md-8 d-flex flex-column justify-content-center align-items-center">

        <div class="card w-100">

            <div class="card-body">

                <h4 class="card-title">
                    {{ $review->title->name }} poop
                </h4>

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class="card-text">
                        <label class="font-weight-bold">
                            Fecha de creación:
                        </label>
                        {{ $review->created_at }}
                    </p>
                </li>
                <li class="list-group-item">
                    <p class="card-text">
                        <label class="font-weight-bold">
                            Fecha de actualización:
                        </label>
                        {{ $review->updated_at }}
                    </p>
                </li>
                <li class="list-group-item">

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
        </div>
    </div>
</div>
@endsection