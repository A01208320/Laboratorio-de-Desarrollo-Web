@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Advertencia') }}
</div>

<div class="card-body">
    <p>¿Está seguro de borrar el registro?</p>
    <hr>
    <div class="d-flex justify-content-end align-items-center">
        <a href="{{route('reviews.index')}}" class="pl-2 ">
            <button class="btn btn-primary">
                Cancelar
            </button>
        </a>
        <form method="POST" class="pl-2 " action="{{route('reviews.destroy', $review)}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary">
                Aceptar
            </button>
        </form>


    </div>
</div>

@endsection