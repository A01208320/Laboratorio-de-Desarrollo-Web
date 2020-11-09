@extends('layouts.app')

@section('content')
<div class="card-header">
    IGDB Games
</div>

<div class="card-body">
    <div class="row p-2 d-flex justify-content-center">
        <x-igdb.table :games="$games" />

    </div>
</div>
@endsection