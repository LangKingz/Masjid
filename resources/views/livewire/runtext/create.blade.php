<form>
    <div class="form-group mb-3">
        <label for="categoryName">Text:</label>
        <input type="text" class="form-control @error('text') is-invalid @enderror" id="text" placeholder="Enter Name" wire:model="text">
        @error('text') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
</form>