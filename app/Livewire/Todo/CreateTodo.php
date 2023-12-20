<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use App\Livewire\Todos;
use Livewire\Component;

class CreateTodo extends Component
{
    public string $name = "";
    public bool $showForm = false;
    public bool $btnShow = true;

    protected $listeners = [
        'showCreateForm' => 'showForm',
    ];

    public function render()
    {
        return view('livewire.todo.create-todo');
    }

    public function showForm()
    {
        $this->showForm = !$this->showForm;
        $this->btnShow = !$this->btnShow;
    }

    protected $rules = [
        'name' => 'required|min:6|max:255',
    ];

    public function store()
    {
        $this->validate();

        Todo::create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->showForm();

        $this->dispatch('todoCreated')->to(Todos::class);
    }
}
