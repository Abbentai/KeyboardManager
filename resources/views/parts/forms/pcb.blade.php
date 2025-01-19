@php
$capitalPartName = strtoupper($partname) 
@endphp

<div class="flexcolumn center gap">
    <h1>{{$capitalPartName}}</h1>

    <md-outlined-text-field label="{{$capitalPartName}} Name" name="name" id="name" value="{{ old('name', $part->name) }}"
        @error('name') error @enderror error-text="Name is required">
        <md-icon slot="leading-icon">switch</md-icon>
    </md-outlined-text-field>


    {{-- <md-outlined-text-field label="Builder Name" name="builder_name" id="builder_name" value="{{ old('url', $keyboard->builder_name) }}"
        @error('url') error @enderror error-text="Must be a valid URL">
        <md-icon slot="leading-icon">person</md-icon>
    </md-outlined-text-field> --}}

    <div class="flex">
        <md-filled-button type="submit">Submit</md-filled-button>
        <md-elevated-button onclick="navigateTo('{{ route('keyboards.view', $keyboardID) }}')" type="button">Back</md-elevated-button>
    </div>
</div>
