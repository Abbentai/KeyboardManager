@extends('main')

@section('content')
    <h1 class="title">Select your keyboard silly billy</h1>
    <h2 class="subtitle">i will be angry if you dont</h2>

    @foreach ($keyswitches as $key => $keyswitch)
        <div class="card">
            <md-elevation></md-elevation>
            <h3>Name: {{ $keyswitch->name }}</h3>
            <h3>Quantity: {{ $keyswitch->quantity }}x</h3>
            <h3>Actuation Force: {{ $keyswitch->actuation_force }}g</h3>
            <h3>Travel Distance: {{ $keyswitch->travel_distance }}g</h3>
            <h3>Type: {{ $keyswitch->type }}</h3>

            <div class="checkbox">
                <h3>Prelubed: </h3>
                <md-checkbox @if ($keyswitch->prelubed == 1) checked @endif onclick="return false;"></md-checkbox>
            </div>

            <h3>Price: €{{ $keyswitch->price }}</h3>
            <h3>Store: {{ $keyswitch->store->name }}</h3>
            <h3>Store: <a href="https://{{ $keyswitch->store->url }}">{{ $keyswitch->store->url }}</a></h3>

        </div>
    @endforeach
@endsection
