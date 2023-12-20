<div>
    <button type="button" wire:click="$dispatch('showCreateForm')" class="{{ $btnShow ? 'd-block' : 'd-none' }} btn btn-primary w-100">Add todo</button>
    <form wire:submit="store" class="{{ $showForm ? 'd-block' : 'd-none' }} card py-2 px-3 bg-white shadow-sm">

        <label for="name" class="form-label">Name</label><br />
        <input type="text" wire:model="name" class="form-control"><br />
        @error('name') <span class="error">{{ $message }}</span><br /> @enderror

        <div class="d-flex justify-content-end">
            <button type="button" wire:click="$dispatch('showCreateForm')" class="btn">Cancel</button>
            <button type="submit" class="btn btn-success ms-2">Save</button>
        </div>
    </form>
</div>