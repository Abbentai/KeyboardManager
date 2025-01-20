    @extends('main')

    @section('content')
        <h2 class="subtitle">{{ $keyboard->name }}</h2>

        @if ($message = session('message'))
            <div id="messageCard" class="card notify fadeInDown">
                <h3>{{ $message }}</h3>
            </div>
        @endif

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


            {{-- needed for deletion to work --}}
            <form id="deletionForm{{ $keyboard->id }}" action="{{ route('keyboards.destroy', $keyboard->id) }}"
                method="POST" class="delete-form">
                @csrf
                @method('DELETE')
            </form>
        </div>

        <div class="flexrow center biggap">
            <div class="card cardsmall">
                <md-elevation></md-elevation>
                <div class="flexrow center">
                    <h2>Switches</h2>
                    <x-svg.keyswitchicon class="icon"></x-svg.keyswitchicon>
                </div>

                {{-- Shows either a create button or the part content depending on if the part is linked or not --}}
                @if ($keyboard->keyswitch_id == null)
                    {{-- Using compact here to pass both the part type and the id of the currently edited keyboard --}}
                    <md-branded-fab size="large" label="Add Keyswitch" class="marginBottom"
                        onclick="navigateTo('{{ route('parts.create', ['type' => 'keyswitch', 'id' => $keyboard->id]) }}')">
                        <x-svg.plusicon class="iconstroke"></x-svg.plusicon>
                    </md-branded-fab>
                @else
                    <div class="flexrow center gap">
                        {{-- <x-svg.keyboardicon class="iconstroke"></x-svg.keyboardicon> --}}
                        <p class="text">Switch Name: {{ $keyboard->keyswitch->name }}</p>
                    </div>
                    <div class="flexrow center gap">
                        {{-- <x-svg.usericon class="iconstroke"></x-svg.usericon> --}}
                        <p class="text">Actuation Force: {{ $keyboard->keyswitch->actuation_force }}</p>
                    </div>
                    <div class="flexrow center gap">
                        {{-- <x-svg.usericon class="iconstroke"></x-svg.usericon> --}}
                        <p class="text">Type: {{ $keyboard->keyswitch->type }}</p>
                    </div>
                    <div class="flexrow center gap">
                        {{-- <x-svg.usericon class="iconstroke"></x-svg.usericon> --}}
                        <p class="text">Travel Distance: {{ $keyboard->keyswitch->travel_distance }}</p>
                    </div>
                    <div class="flexrow center gap">
                        {{-- <x-svg.usericon class="iconstroke"></x-svg.usericon> --}}
                        <p class="text">Quantity: {{ $keyboard->keyswitch->quantity }}</p>
                    </div>
                    <div class="flexrow center gap">
                        {{-- <x-svg.usericon class="iconstroke"></x-svg.usericon> --}}
                        <p class="text">Price: {{ $keyboard->keyswitch->price }}</p>
                    </div>
                    <div class="flexrow center gap">
                        {{-- <x-svg.usericon class="iconstroke"></x-svg.usericon> --}}
                        <p class="text">Store: {{ $keyboard->keyswitch->store->name }}</p>
                    </div>
                    <div class="flexrow center gap">
                        <div class="checkbox">
                            <h3>Prelubed: </h3>
                            <md-checkbox @if ($keyboard->keyswitch->prelubed == 1) checked @endif
                                onclick="return false;"></md-checkbox>
                        </div>
                    </div>

                    <div class="flexrow center gap interactionButtons">
                        {{-- Continue on edit controller --}}
                        <md-outlined-icon-button type="button"
                            href="{{ route('parts.edit', ['type' => 'keyswitch', 'keyboardID' => $keyboard->id, 'id' => $keyboard->keyswitch->id]) }}">
                            <md-icon>edit</md-icon>
                        </md-outlined-icon-button>

                        <md-outlined-icon-button onclick="openDialogue({{ $keyboard->id }})">
                            <md-icon>delete</md-icon>
                        </md-outlined-icon-button>

                        <md-outlined-icon-button type="button" href="{{ route('keyboards.index', $keyboard->id) }}">
                            <md-icon>arrow_back</md-icon>
                        </md-outlined-icon-button>
                    </div>

                    @include('keyboardviews.delete-alert', [
                        'part' => $keyboard->keyswitch,
                        'partname' => 'part',
                        'partID' => $keyboard->keyswitch->id,
                        'keyboardID' => $keyboard->id,
                    ])
                @endif
                {{-- Edit and Delete buttons --}}



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
    @endsection
