<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class UsersTable extends Component
{
    use WithPagination;

    public $search = '';
    public $admin = '';

    public $is_admin_user = false;

    public $sortBy = 'id';
    public $sortDir = 'DESC';

    public $perPage = 10;

    public $openModal = false;

    public function mount($is_admin)
    {
        $this->is_admin_user = $is_admin;
    }

    public function delete(User $user)
    {
        $user->delete();
        $this->openModal = false;
    }

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir === "ASC") ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    #[On('edit-users')]
    #[On('user-deleted')]
    public function render()
    {
        return view(
            'livewire.users-table',
            [
                'users' => User::search($this->search)
                    ->when($this->admin !== '', function ($query) {
                        $query->where('is_admin', $this->admin);
                    })
                    ->orderBy($this->sortBy, $this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
