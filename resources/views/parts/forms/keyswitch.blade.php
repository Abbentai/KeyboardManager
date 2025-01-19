@php
    $capitalPartName = strtoupper($partname[0]) . substr($partname, 1);
    $part->keyboardID = $keyboardID;
@endphp

<div class="flexcolumn center gap">
    <h1>{{ $capitalPartName }}</h1>

    <div class="flexrow spaceBetween gap">
        <md-outlined-text-field label="{{ $capitalPartName }} Name" required name="name" id="name"
            value="{{ old('name', $part->name) }}" @error('name') error @enderror error-text="Name is required">
            <md-icon slot="leading-icon">switch</md-icon>
        </md-outlined-text-field>

        <md-outlined-text-field label="Actuation Force (g)" required name="actuation_force" id="actuation_force"
            inputmode=”numeric” suffix-text="g"> value="{{ old('actuation_force', $part->actuation_force) }}"
            @error('actuation_force')
                error
            @enderror error-text="Actuation Force is required">
            <md-icon slot="leading-icon">weight</md-icon>
        </md-outlined-text-field>
    </div>


    <div class="flexrow spaceBetween gap">
        <md-outlined-text-field label="Switch Type" required name="type" id="type"
            value="{{ old('type', $part->type) }}" @error('type') error @enderror error-text="Type is required">
            <md-icon slot="leading-icon">question_mark</md-icon>
        </md-outlined-text-field>

        <md-outlined-text-field label="Travel Distance (mm)" required name="travel_distance" id="travel_distance"
            inputmode=”numeric” suffix-text="mm"> value="{{ old('travel_distance', $part->travel_distance) }}"
            @error('travel_distance')
                error
            @enderror error-text="Travel Distance is required">
            <md-icon slot="leading-icon">straighten</md-icon>
        </md-outlined-text-field>


    </div>


    <div class="flexrow spaceBetween gap">
        <md-outlined-text-field label="Quantity" required name="quantity" id="quantity" inputmode=”numeric”
            suffix-text="x">
            value="{{ old('quantity', $part->quantity) }}"
            @error('quantity')
                error
            @enderror error-text="Quantity is required">
        </md-outlined-text-field>

        <md-outlined-text-field label="Price" name="price" id="price" inputmode=”numeric” prefix-text="€">
            value="{{ old('price', $part->price) }}"
            @error('price')
                error
            @enderror error-text="Price cannot be less then 0.00">
            <md-icon slot="leading-icon">weight</md-icon>
        </md-outlined-text-field>
    </div>


    <div class="flexrow spaceBetween gap">
        <md-outlined-select label="Store" name="store_id" required>
            <md-select-option aria-label="blank">Select a Store</md-select-option>
            @foreach ($stores as $store)
                <md-select-option value="{{ $store->id }}" @if (old('store_id', $part->store_id) == $store->id) selected @endif>
                    {{ $store->name }}
                </md-select-option>
            @endforeach

        </md-outlined-select>

        <div class="checkbox">
            <p>Prelubed: </p>
            <md-checkbox name="prelubed" value=1 @if (old('prelubed', $part->prelubed) == 1) checked @endif></md-checkbox>
        </div>
    </div>

    <input type="hidden" name="keyboardID" value="{{ $keyboardID }}" />

    <div class="flex">
        <md-filled-button type="submit">Submit</md-filled-button>
        <md-elevated-button onclick="navigateTo('{{ route('keyboards.view', $keyboardID) }}')"
            type="button">Back</md-elevated-button>
    </div>
</div>
