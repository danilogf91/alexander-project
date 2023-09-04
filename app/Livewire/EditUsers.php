<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUsers extends Component
{
    public $user;

    public $openModal = false;

    public $name = '';
    public $email = '';
    public $is_admin;
    public $active;
    public $created_at;

    public function edit(User $user)
    {
        $this->openModal = false;
        $this->dispatch('edited-user');
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_admin = $user->is_admin;
        $this->active = $user->active;
        $this->created_at = date("Y-m-d", strtotime($user->created_at));
    }

    public function render()
    {
        return view('livewire.edit-users');
    }
}
