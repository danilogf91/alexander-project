<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ProjectsTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    public $sortBy = 'id';
    public $sortDir = 'DESC';

    public $is_admin_user = false;

    public function mount($is_admin)
    {
        $this->is_admin_user = $is_admin;
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

    #[On('project-deleted')]
    #[On('project-created')]
    #[On('edit-projects')]
    public function render()
    {
        return view(
            'livewire.projects-table',
            [
                'projects' => Project::search($this->search)
                    // ->when($this->admin !== '', function ($query) {
                    //     $query->where('is_admin', $this->admin);
                    // })
                    ->orderBy($this->sortBy, $this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
