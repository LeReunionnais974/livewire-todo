<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Todos extends Component
{
    protected $listeners = [
        'todoCreated' => '$refresh',
        'todoUpdated' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.todos', [
            'todos' => Todo::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function toggleTodo(Todo $todo)
    {
        Gate::authorize('update-todo', $todo);

        $todo->completed = !$todo->completed;

        $todo->save();
    }

    public function destroy(Todo $todo)
    {
        Gate::authorize('update-todo', $todo);

        $todo->delete();
    }
}
