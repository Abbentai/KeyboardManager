<div class="flexcolumn center gap">
    <h1>Store</h1>

    <md-outlined-text-field label="Store Name" name="name" id="name" value="{{ old('name', $store->name) }}"
        @error('name') error @enderror error-text="Name is required">
        <md-icon slot="leading-icon">store</md-icon>
    </md-outlined-text-field>


    <md-outlined-text-field label="Store Url" name="url" id="url" value="{{ old('url', $store->url) }}"
        @error('url') error @enderror error-text="Must be a valid URL">
        <md-icon slot="leading-icon">link</md-icon>
    </md-outlined-text-field>

    <div class="flex">
        <md-filled-button type="submit">Submit</md-filled-button>
        <md-elevated-button onclick="navigateTo('{{ route('stores.index') }}')" type="button">Back</md-elevated-button>
    </div>
</div>
