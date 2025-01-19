<div class="flexcolumn center gap">
    <h1>Keyboard</h1>

    <md-outlined-text-field label="Keyboard Name" required name="name" id="name" value="{{ old('name', $keyboard->name) }}"
        @error('name') error @enderror error-text="Name is required">
        <md-icon slot="leading-icon">keyboard</md-icon>
    </md-outlined-text-field>


    <md-outlined-text-field label="Builder Name" required name="builder_name" id="builder_name" value="{{ old('url', $keyboard->builder_name) }}"
        @error('url') error @enderror error-text="Must be a valid URL">
        <md-icon slot="leading-icon">person</md-icon>
    </md-outlined-text-field>

    <div class="flex">
        <md-filled-button type="submit">Submit</md-filled-button>
        <md-elevated-button onclick="navigateTo('{{ route('keyboards.index') }}')" type="button">Back</md-elevated-button>
    </div>
</div>
