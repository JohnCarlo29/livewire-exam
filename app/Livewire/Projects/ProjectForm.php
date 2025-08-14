<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectForm extends Component
{
    public ?Project $project = null;

    public $name = '';

    public $description = '';

    public $status = 'draft';

    public $dueDate = null;

    public $projectId;

    public $editMode = false;

    protected $rules = [
        'name' => 'required|string|min:3',
        'description' => 'nullable|string',
        'status' => 'required|in:draft,active,completed',
        'dueDate' => 'nullable|date',
    ];

    public function mount($project = null)
    {
        if ($project) {
            $this->project = $project;
            $this->fillForm($project);
        }
    }

    private function fillForm(Project $project)
    {
        $this->name = $project->name;
        $this->description = $project->description;
        $this->status = $project->status;
        $this->dueDate = $project->due_date;
        $this->projectId = $project->id;
        $this->editMode = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editMode) {
            $project = Project::find($this->projectId);
            $project->update([
                'name' => $this->name,
                'description' => $this->description,
                'status' => $this->status,
                'due_date' => $this->dueDate,
            ]);
        } else {
            Project::create([
                'name' => $this->name,
                'description' => $this->description,
                'status' => $this->status,
                'due_date' => $this->dueDate,
            ]);
        }

        $this->reset();

        $this->dispatch('projectSaved');
    }

    public function render()
    {
        return view('livewire.projects.project-form');
    }
}
