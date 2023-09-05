<?php

namespace App\Livewire;

use App\Exports\DataExport;
use App\Models\Project;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class DataTable extends Component
{
    public $is_admin_user = false;
    public $active = false;
    public $data;
    public $name;
    public $id;

    public function mount($is_admin, $active, $data, $name, $id)
    {
        $this->is_admin_user = $is_admin;
        $this->active = $active;
        $this->data = $data;
        $this->name = $name;
        $this->id = $id;
    }

    public function export()
    {
        return Excel::download(new DataExport($this->id), 'data.xlsx');
    }

    public function render()
    {
        return view('livewire.data-table');
    }
}
