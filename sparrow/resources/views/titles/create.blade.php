@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Registrar') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('titles.store')}}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid error-input @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="edition" class="col-md-4 col-form-label text-md-right">{{ __('Edición') }}</label>
            <div class="col-md-6">
                <input id="edition" type="text" class="form-control @error('edition') is-invalid error-input @enderror" name="edition" value="{{ old('edition') }}" required autocomplete="edition" autofocus>
                @error('edition')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
            <div class="col-md-6">
                <select id="state" type="text" class="custom-select @error('state') is-invalid error-input @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>
                    <option value="1">Nuevo</option>
                    <option value="0">Usado</option>
                </select>
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="platform_id" class="col-md-4 col-form-label text-md-right">{{ __('Plataforma') }}</label>
            <div class="col-md-6">
                <select id="platform_id" type="text" class="custom-select @error('platform_id') is-invalid error-input @enderror" name="platform_id" value="{{ old('platform_id') }}" required autocomplete="platform_id" autofocus>
                    @foreach($platforms as $platform)
                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                    @endforeach
                </select>
                @error('platform_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Aceptar') }}
                </button>
            </div>
        </div>

    </form>
</div>

@endsection