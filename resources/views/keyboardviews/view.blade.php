@extends('main')

@section('content')
    <h2 class="subtitle">{{ $keyboard->name }}</h2>

    <div class="card cardsmall">
        <md-elevation></md-elevation>
        <div class="flexrow center">
            <h2>Core Details<h2>
        </div>

        <div class="flexrow center gap">
            <x-svg.keyboardicon class="iconstroke"></x-svg.keyboardicon>
            <p class="text">Name: {{ $keyboard->name }}</p>

        </div>
        <div class="flexrow center gap">
            <x-svg.usericon class="iconstroke"></x-svg.usericon>
            <p class="text">Builder: {{ $keyboard->builder_name }}</p>
        </div>

        {{-- Edit and Delete buttons --}}
        <div class="flexrow center gap interactionButtons">
            <md-outlined-icon-button type="button" href="{{ route('keyboards.edit', $keyboard->id) }}">
                <md-icon>edit</md-icon>
            </md-outlined-icon-button>

            <md-outlined-icon-button onclick="openDialogue({{ $keyboard->id }})">
                <md-icon>delete</md-icon>
            </md-outlined-icon-button>

            <md-outlined-icon-button type="button" href="{{ route('keyboards.index', $keyboard->id) }}">
                <md-icon>arrow_back</md-icon>
            </md-outlined-icon-button>
        </div>

        {{-- needed for deletion to work --}}
        <form id="deletionForm{{ $keyboard->id }}" action="{{ route('keyboards.destroy', $keyboard->id) }}" method="POST"
            class="delete-form">
            @csrf
            @method('DELETE')
        </form>
    </div>




    <div class="flexrow center biggap">
        

        <div class="card cardsmall">
            <md-elevation></md-elevation>
            <div class="flexrow center">
                <h2>Switches</h2>
                <x-svg.keyswitchicon class="iconstroke"></x-svg.keyswitchicon>

            </div>

            {{-- Shows either a create button or the part content depending on if the part is linked or not --}}
            @if ($keyboard->keyswitch_id == null)
                {{-- Using compact here to pass both the part type and the id of the currently edited keyboard --}}
                <md-branded-fab size="large" label="Add Keyswitch" class="marginBottom"
                    onclick="navigateTo('{{ route('parts.create', ['type' => 'keyswitch', 'id' => $keyboard->id]) }}')">
                    <x-svg.plusicon class="iconstroke"></x-svg.plusicon>
                </md-branded-fab>
            @else
                <h2>Switch Name: {{ $keyboard->keyswitch->name }}</h2>
                <h2>Actuation Force: {{ $keyboard->keyswitch->actuation_force }}</h2>
                <h2>Price: {{ $keyboard->keyswitch->price }}</h2>
                <h2>Quantity: {{ $keyboard->keyswitch->quantity }}x</h2>
                <h2>Store Name:{{ $keyboard->keyswitch->store->name }}</h2>
            @endif
        </div>


        <div class="card cardsmall">
            <div class="flexrow center">
                <h2>PCB</h2>
            </div>

            {{-- Shows either a create button or the part content depending on if the part is linked or not --}}
            @if ($keyboard->keyswitch_id == null)
                <md-branded-fab size="large" label="Add PCB" class="marginBottom"
                    onclick="navigateTo('{{ route('parts.create', ['type' => 'pcb', 'id' => $keyboard->id]) }}')">
                    <x-svg.plusicon class="iconstroke"></x-svg.plusicon>
                </md-branded-fab>
            @else
                <h1>not null</h1>
            @endif
        </div>
    </div>



    <div class="flexrow center gap">
        <md-elevated-button style="scale: 150%" onclick="navigateTo('{{ route('keyboards.index') }}')"
            type="button">Back</md-elevated-button>
    </div>

    <md-dialog id="dialogue" class="fadeInDown" storeid="">
        <div slot="headline">
            Delete Keyboard
        </div>
        {{-- needed for deletion to work --}}
        <form slot="content" id="form-id" method="dialog">
            Are you sure you want to delete this keyboard?
        </form>
        <div slot="actions">
            <md-text-button class="deleteButton"
                href="{{ route('keyboards.destroy', $keyboard->id) }}">Delete</md-text-button>
            <md-text-button form="form-id">Cancel</md-text-button>
        </div>
    </md-dialog>
@endsection
