<div class="mt-1">
    <form wire:submit="update({{ $todo->id }})" class="{{ $showForm ? 'd-block' : 'd-none' }} card py-2 px-3 shadow-sm">

        <label for="name" class="form-label">Name</label><br />
        <input type="text" wire:model="name" class="form-control bg-white"><br />
        @error('name') <span class="error">{{ $message }}</span><br /> @enderror

        <div class="d-flex justify-content-end">
            <button wire:click="$dispatch('showUpdateForm', { todoId: {{ $todo->id }} })" type="button" class="btn">Cancel</button>
            <button type="submit" class="btn btn-primary ms-2">Save</button>
        </div>
    </form>
</div>