@extends('main')

@section('content')
    <div>
        <h2 class="subtitle">Editing Store:  {{$store->name}}</h2>
        <h2 class="subsubtitle">From here you can edit an existing store</h2>
    </div>

    <div class="card gap highelevation">
        <md-elevation></md-elevation>
        <form action="{{route('stores.update', $store->id)}}" method="POST">
            @method('PUT')
            {{-- everytime user submits a form, the user has a unique tokens --}}
            @csrf 
            @include('storeviews.form')
        </form>
    </div>
@endsection
