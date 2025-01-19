@extends('main')

@section('content')
    <h1 class="title">Select your keyboard</h1>
    {{-- <h2 class="subtitle">i will be angry if you dont</h2> --}}

    @if ($message = session('message'))
        <div id="messageCard" class="card notify fadeInDown">
            <h3>{{ $message }}</h3>
        </div>
    @endif

    @foreach ($keyboards as $key => $keyboard)
        <div class="card cardsmall cardSelectable" onclick="navigateTo('{{ route('keyboards.view', $keyboard->id) }}')">
            <md-elevation></md-elevation>
            <md-ripple></md-ripple>

            <div class="flexrow center gap">
                <x-svg.keyboardicon class="iconstroke"></x-svg.keyboardicon>
                <p class="text">Name: {{ $keyboard->name }}
                </p>
            </div>

            <div class="flexrow center gap">
                <x-svg.usericon class="iconstroke"></x-svg.keyboardicon>
                    <p class="text">Builder: {{ $keyboard->builder_name }}
                    </p>
            </div>

            {{-- Edit and Delete buttons --}}
            {{-- <div class="flexrow center gap">
                <md-outlined-icon-button type="button" href="{{ route('keyboards.edit', $keyboard->id) }}">
                    <md-icon>edit</md-icon>
                </md-outlined-icon-button>

                <md-outlined-icon-button onclick="openDialogue({{$keyboard->id}})">
                    <md-icon>delete</md-icon>
                </md-outlined-icon-button>
            </div> --}}
            {{-- needed for deletion to work --}}
            {{-- <form id="deletionForm{{$keyboard->id}}" action="{{ route('keyboards.destroy', $keyboard->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
            </form> --}}

        </div>
    @endforeach



    <md-dialog id="dialogue" class="fadeInDown" storeid="">
        <div slot="headline">
            Delete Keyboard
        </div>
        {{-- needed for deletion to work --}}
        <form slot="content" id="form-id" method="dialog">
            Are you sure you want to delete this keyboard?
        </form>
        <div slot="actions">
            @if (!$keyboards->isEmpty())
                <md-text-button class="deleteButton"
                    href="{{ route('keyboards.destroy', $keyboard->id) }}">Delete</md-text-button>
            @endif
            <md-text-button form="form-id">Cancel</md-text-button>
        </div>
    </md-dialog>


    <md-branded-fab size="large" label="Add Keyboard" onclick="navigateTo('{{ route('keyboards.create') }}')">
        <x-svg.plusicon class="iconstroke"></x-svg.plusicon>
    </md-branded-fab>

    {{-- Fab button that is permanently attached to the bottom right corner of the screen --}}
    <div class="fabalign">
        <md-fab size="large" aria-label="Add" onclick="navigateTo('{{ route('keyboards.create') }}')">
            <md-icon class="largeicon" slot="icon">add</md-icon>
        </md-fab>
    </div>


    {{-- @foreach ($keyswitches as $key => $keyswitch)
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
            <h3>Store: <a href="{{ $keyswitch->store->url }}">{{ $keyswitch->store->url }}</a></h3>

        </div>
    @endforeach --}}
@endsection
