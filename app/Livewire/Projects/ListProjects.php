<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ListProjects extends Component
{
    public $search = '';
    public $isModalOpen = false;
    public $editMode = false;
    public $project = [
        'name' => '',
        'description' => '',
    ];

    protected $listeners = ['projectSaved' => '$refresh'];

    public function createProject()
    {
        $this->resetProject();
        $this->editMode = false;
        $this->isModalOpen = true;
    }

    public function editProject($id)
    {
        $this->project = Project::find($id)->toArray();
        $this->editMode = true;
        $this->isModalOpen = true;
    }

    public function resetProject()
    {
        $this->project = [
            'name' => '',
            'description' => '',
        ];
    }

    public function render()
    {
        return view('livewire.projects.list', [
            'projects' => Project::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })->get()
        ]);
    }
}
