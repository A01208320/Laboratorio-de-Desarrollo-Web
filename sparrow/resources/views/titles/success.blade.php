@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Éxito') }}
</div>

<div class="card-body">
    <p>¡La operación fue exitosa!</p>
    <hr>
    <div class="d-flex justify-content-end align-items-center">
        <a href="{{route('clases.index')}}" class="pl-2 ">
            <button class="btn btn-primary">
                Continuar
            </button>
        </a>
    </div>
</div>

@endsection