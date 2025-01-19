@extends('main')

@section('content')
    <div>
        <h2 class="subtitle">Create a new Keyboard</h2>
        <h2 class="subsubtitle">From here you can create a keyboard to start your new build.</h2>
    </div>

    <div class="card gap highelevation">
        <md-elevation></md-elevation>
        {{-- Needs to be changed --}}
        <form action="{{route('keyboards.store')}}" method="POST">
            {{-- everytime user submits a form, the user has a unique tokens --}}
            @csrf 
            @include('keyboardviews.form')
        </form>
    </div>
@endsection
