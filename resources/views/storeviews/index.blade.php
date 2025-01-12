@extends('main')

@section('content')
    <h2 class="subtitle">Stores:</h2>

    {{-- Loads each store as its own card --}}
    @foreach ($stores as $key => $store)
        <div class="card cardsmall">
            <md-elevation></md-elevation>

            <div class="flexrow center gap">
                {{-- This is an example of loading an svg in the application --}}
                {{-- Note that the {{$attributes}} section of each svg file loads the css details for the icons --}}
                <x-svg.storeicon class="icon"></x-svg.storeicon>
                <h3>Store: {{ $store->name }}</h3>
            </div>

            <div class="flexrow center gap">
                <x-svg.urlicon class="icon"></x-svg.urlicon>
                <h3>Url: <a class="link truncatedUrl" href="{{ $store->url }}">{{ $store->name }}'s link</a></h3>
            </div>

            {{-- Edit and Delete buttons --}}



            {{-- needed for deletion to work --}}
            <form action="{{ route('stores.destroy', $store->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <div class="flexrow center gap">

                    <md-outlined-icon-button type="button">
                        <md-icon>edit</md-icon>
                    </md-outlined-icon-button>

                    <md-outlined-icon-button type="submit">
                        <md-icon>delete</md-icon>
                    </md-outlined-icon-button>
                </div>
            </form>

        </div>
    @endforeach



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
