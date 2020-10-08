@extends('layouts.app')

@section('content')

<div class="card-header">
    {{ __('Editar') }}
</div>

<div class="card-body">
    <form method="POST" action="{{route('reviews.update', $review)}}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="recommendation" class="col-md-4 col-form-label text-md-right">{{ __('Recomendación') }}</label>
            <div class="col-md-6">
                <select id="recommendation" type="text" class="custom-select @error('recommendation') is-invalid error-input @enderror" name="recommendation" value="{{ $review->recommendation }}" required autocomplete="recommendation" autofocus>
                    <option value="1">Recomendado</option>
                    <option value="0">No Recomendado</option>
                </select>
                @error('recommendation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comentario') }}</label>
            <div class="col-md-6">
                <textarea rows="5" id="comment" type="text" class="form-control @error('comment') is-invalid error-input @enderror" name="comment" value="{{ $review->comment }}" required autofocus>
                {{ $review->comment }}
                </textarea>
                @error('comment')
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