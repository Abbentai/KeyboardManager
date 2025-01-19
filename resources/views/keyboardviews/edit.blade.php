@extends('main')

@section('content')
    <div>
        <h2 class="subtitle">Editing Keyboard:  {{$keyboard->name}}</h2>
        <h2 class="subsubtitle">From here you can edit an existing keyboard</h2>
    </div>

    <div class="card gap highelevation">
        <md-elevation></md-elevation>
        {{-- Needs to be changed --}}
        <form action="{{route('keyboards.update', $keyboard->id)}}" method="POST">
            @method('PUT')
            {{-- everytime user submits a form, the user has a unique tokens --}}
            @csrf 
            @include('keyboardviews.form')
        </form>
    </div>
@endsection
