<div>
    <div class="d-flex align-items-center justify-content-between mb-2">
        <div>
            <h1 class="fs-5 mb-0">To Do List</h1>
        </div>

        <livewire:todo.create-todo />
    </div>

    @forelse ($todos as $todo)
    <div class="card bg-white shadow-sm w-100 py-2 px-3 mb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <input wire:change="toggleTodo({{ $todo->id }})" type="checkbox" class="form-check-input" {{ $todo->completed ? 'checked' : '' }}>
                <p class="{{ $todo->completed ? 'text-decoration-line-through' : '' }} m-0 ms-2">{{ $todo->name }}</p>
            </div>
            <div class="d-flex align-items-center">
                <button wire:click="$dispatch('showUpdateForm', { todoId: {{ $todo->id }} })" type="button" class="btn btn-light shadow-sm">
                    <i class="bi bi-pencil"></i>
                </button>
                <button wire:click="destroy({{ $todo->id }})" wire:confirm="Are you sure you want to delete this todo?" class="btn btn-danger shadow-sm ms-2">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>

        <livewire:todo.update-todo :$todo :key="$todo->id" />
    </div>
    @empty
    <div class="col rounded d-flex py-2 px-3 items-center bg-info">
        <i class="bi bi-info-circle"></i>
        <p class="ms-2 mb-0">No to-do found.</p>
    </div>
    @endforelse
</div>