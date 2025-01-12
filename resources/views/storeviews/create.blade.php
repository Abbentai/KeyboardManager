@extends('main')

@section('content')
    <div>
        <h2 class="subtitle">Create a new Store</h2>
        <h2 class="subsubtitle">From here you can create a new store to associate with your parts.</h2>
    </div>

    <div class="card gap highelevation">
        <md-elevation></md-elevation>
        <form action="{{route('stores.store')}}" method="POST">
            {{-- everytime user submits a form, the user has a unique tokens --}}
            @csrf 
            @include('storeviews.form')
        </form>
    </div>
@endsection
