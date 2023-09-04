<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class SaveProjectsData extends Component
{
    public $project;
    public $openModal;

    public function mount(Project $project)
    {
        $this->project = $project;
        // $this->name = $user->name;
        // $this->email = $user->email;
        // $this->is_admin = $user->is_admin;
        // $this->active = $user->active;
        // $this->created_at = date("Y-m-d", strtotime($user->created_at));
    }

    public function render()
    {
        return view('livewire.save-projects-data');
    }
}
