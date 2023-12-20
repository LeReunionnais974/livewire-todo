<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use App\Livewire\Todos;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class UpdateTodo extends Component
{
    public Todo $todo;

    public string $name = "";
    public bool $showForm = false;

    protected $listeners = [
        'showUpdateForm' => 'updateForm',
    ];

    public function mount(Todo $todo)
    {
        $this->name = $todo->name;
    }

    public function render()
    {
        return view('livewire.todo.update-todo');
    }

    public function updateForm($todoId)
    {
        if ($this->todo->id == $todoId) {
            $this->showForm = !$this->showForm;
        }
    }

    protected $rules = [
        'name' => 'required|min:6|max:255',
    ];

    public function update(Todo $todo)
    {
        Gate::authorize('update-todo', $todo);

        $this->validate();

        $todo->update([
            'name' => $this->name,
        ]);

        $this->dispatch('todoUpdated')->to(Todos::class);

        $this->updateForm($todo->id);
    }
}
