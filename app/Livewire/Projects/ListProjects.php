<?php

namespace App\Livewire\Projects;

use App\Actions\Projects\DeleteProject;
use App\Models\Project;
use Livewire\Component;

class ListProjects extends Component
{
    public $search = '';

    public $isModalOpen = false;

    public $editMode = false;

    public ?Project $selectedProject = null;

    protected $listeners = ['projectSaved' => 'projectSaved', 'closeModal' => 'closeModal'];

    public function projectSaved()
    {
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function createProject()
    {
        $this->selectedProject = null;
        $this->editMode = false;
        $this->isModalOpen = true;
    }

    public function editProject($id)
    {
        $this->selectedProject = Project::findOrFail($id);
        $this->editMode = true;
        $this->isModalOpen = true;
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        new DeleteProject()->execute($project);
        session()->flash('message', 'Project deleted successfully.');
    }

    public function render()
    {
        return view('livewire.projects.list', [
            'projects' => Project::where(function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%');
            })->get(),
        ]);
    }
}
