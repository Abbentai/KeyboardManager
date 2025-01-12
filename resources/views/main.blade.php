{{-- Import map with CDN to import google's material web throughout the whole application, tried to do it via npm but failed --}}
<script type="importmap">
    {
        "imports": {
            "@material/web/": "https://esm.run/@material/web/"
        }
    }
</script>
<script type="module">
    import '@material/web/all.js';
    import {
        styles as typescaleStyles
    } from '@material/web/typography/md-typescale-styles.js';

    document.adoptedStyleSheets.push(typescaleStyles.styleSheet);
</script>



{{-- Main page of the whole application --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Material icons --}}
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('material-theme/css/light.css') }}" rel="stylesheet">
<link href="{{ asset('material-theme/css/dark.css') }}" rel="stylesheet">

{{-- Navbar used throughout --}}
<nav class="navbar highelevation">
    <md-elevation></md-elevation>

    {{-- The if in the class is to show the current selected page --}}
    <a href="/" title="Delete"><p class="@if(Route::currentRouteName() == '') active @endif">Home</p></a>
    <a href="{{ route('keyboards.index') }}" title="Delete"><p class="@if(Route::currentRouteName() == 'keyboards.index') active @endif">Keyboards</p></a>
    <a href="{{ route('stores.index') }}"><p class="@if(Route::currentRouteName() == 'stores.index') active @endif">Stores</p></a>
    <md-filled-icon-button id="toggleTheme">
        <md-icon class="material-symbols-outlined">dark_mode</md-icon>
    </md-filled-icon-button>
</nav>

{{-- container whose content changes throughout each route --}}
<body onload="onLoad()">
    <div class="mainContainer">
        @yield('content')
        {{-- <h1 class="md-typescale-display-medium">Hello Material!</h1>
        <p class="md-typescale-body-large">Check out these controls in a form!</p>
        <md-checkbox></md-checkbox>
        <div>
            <md-radio name="group"></md-radio>
            <md-radio name="group"></md-radio>
            <md-radio name="group"></md-radio>
        </div>
        <md-outlined-text-field label="Favorite color" value="Purple"></md-outlined-text-field>
        <md-outlined-button type="reset">Reset</md-outlined-button>

        <md-chip-set>
            <md-assist-chip label="Assist"></md-assist-chip>
            <md-filter-chip label="Filter"></md-filter-chip>
            <md-input-chip label="Input"></md-input-chip>
            <md-suggestion-chip label="Suggestion"></md-suggestion-chip>
        </md-chip-set> --}}

    </div>
</body>
</html>
<script src="{{ asset('js/script.js') }}"></script>
