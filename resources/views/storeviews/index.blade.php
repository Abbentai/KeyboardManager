@extends('main')

@section('content')
    <h2 class="subtitle">Your Stores</h2>

    @if ($message = session('message'))
    <div id="messageCard" class="card notify fadeInDown">
        <h3>{{$message}}</h3>
    </div>
    @endif

    @foreach ($stores as $key => $store)
        <div class="card cardsmall">
            <md-elevation></md-elevation>

            <div class="flexrow center gap">
                {{-- This is an example of loading an svg in the application --}}
                {{-- Note that the {{$attributes}} section of each svg file loads the css details for the icons --}}
                <x-svg.storeicon class="icon"></x-svg.storeicon>
                <p class="text">Store: {{ $store->name }}<p>
            </div>

            <div class="flexrow center gap">
                <x-svg.urlicon class="icon"></x-svg.urlicon>
                <p class="text">Url: <a class="link truncatedUrl" href="{{ $store->url }}" target="_blank">{{ $store->name }}'s link</a></p>
            </div>

            {{-- Edit and Delete buttons --}}

            <div class="flexrow center gap interactionButtons">
                {{-- Edit and Delete buttons --}}
                <md-outlined-icon-button type="button" href="{{ route('stores.edit', $store->id) }}">
                    <md-icon>edit</md-icon>
                </md-outlined-icon-button>

                <md-outlined-icon-button onclick="openDialogue({{$store->id}})">
                    <md-icon>delete</md-icon>
                </md-outlined-icon-button>
            </div>
            {{-- needed for deletion to work --}}
            <form id="deletionForm{{$store->id}}" action="{{ route('stores.destroy', $store->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
            </form>

        </div>
    @endforeach

    <md-dialog id="dialogue" class="fadeInDown" storeid="">
        <div slot="headline">
            Delete Store
        </div>
        {{-- needed for deletion to work --}}
        <form slot="content" id="form-id" method="dialog">
            Are you sure you want to delete this store?
          </form>
        <div slot="actions">
            @if (!$stores->isEmpty())
                <md-text-button class="deleteButton" href="{{ route('stores.destroy', $store->id) }}">Delete</md-text-button>
            @endif
            <md-text-button form="form-id">Cancel</md-text-button>
        </div>
    </md-dialog>


    <md-branded-fab size="large" label="Add Store" onclick="navigateTo('{{ route('stores.create') }}')">
        <x-svg.plusicon class="iconstroke"></x-svg.plusicon>
    </md-branded-fab>

    {{-- Fab button that is permanently attached to the bottom right corner of the screen --}}
    <div class="fabalign">
        <md-fab size="large" aria-label="Add" onclick="navigateTo('{{ route('stores.create') }}')">
            <md-icon class="largeicon" slot="icon">add</md-icon>
        </md-fab>
    </div>
@endsection
