@extends('main')

@section('content')
    <div>
        <h2 class="subtitle">Create a new {{$partname}}</h2>
        <h2 class="subsubtitle">From here you can create a {{$partname}} to add to your build.</h2>
    </div>

    <div class="card gap highelevation">
        <md-elevation></md-elevation>
        {{-- Needs to be changed --}}
        <form action="{{route('parts.store')}}" method="POST">
            {{-- everytime user submits a form, the user has a unique tokens --}}
            @csrf 
            @include('parts.forms.' . $partname)
        </form>
    </div>
@endsection
