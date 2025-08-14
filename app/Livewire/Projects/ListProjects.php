<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ListProjects extends Component
{
    public $projects;
    public $search = '';
    public $isModalOpen = false;
    public $editMode = false;
    public $project = [
        'name' => '',
        'description' => '',
    ];

    protected $listeners = ['projectSaved' => 'fetchProjects'];

    public function mount()
    {
        $this->fetchProjects();
    }

    public function updatedSearch()
    {
        $this->fetchProjects();
    }

    public function fetchProjects()
    {
        $this->projects = Project::where('name', 'like', '%' . $this->search . '%')->get();
    }

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
        return view('livewire.projects.list');
    }
}