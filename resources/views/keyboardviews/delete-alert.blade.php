{{-- Reusable alert --}}
<md-dialog id="{{$partname}}Dialogue" class="fadeInDown" storeid="">
    <div slot="headline">
        Delete {{$partname}}
    </div>
    {{-- needed for deletion to work --}}
    <form slot="content" id="form-id" method="dialog">
        Are you sure you want to delete this {{$partname}}?
    </form>
    <div slot="actions">
        <md-text-button class="deleteButton"
            href="{{ route($partname . 's.destroy', ['type' => $part->name, 'id' => $partID, 'keyboardID' => $keyboardID]) }}">Delete</md-text-button>
        <md-text-button form="form-id">Cancel</md-text-button>
    </div>
</md-dialog>

{{-- needed for deletion to work --}}
{{-- <form id="deletionForm{{ $partID }}" action="{{ route('parts.destroy', ['type' => $part->name, 'id' => $partID, 'keyboardID' => $keyboardID]) }}"
    method="POST" class="delete-form">
    @csrf
    @method('DELETE')
</form> --}}