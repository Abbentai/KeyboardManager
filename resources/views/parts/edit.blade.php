@extends('main')

@section('content')
    <div>
        <h2 class="subtitle">Editing {{$partname}}:  {{$part->name}}</h2>
        <h2 class="subsubtitle">From here you can edit an existing {{$partname}}</h2>
    </div>

    <div class="card gap highelevation">
        <md-elevation></md-elevation>
        {{-- Needs to be changed --}}
        <form action="{{route('parts.update', $part->id)}}" method="POST">
            @method('PUT')
            {{-- everytime user submits a form, the user has a unique tokens --}}
            @csrf 
            @include('parts.forms.' . $partname)
        </form>
    </div>
@endsection
