<?php

namespace App\Actions\Projects;

use App\Models\Project;

class UpdateProject
{
    public function execute(Project $project, array $data): Project
    {
        $project->update($data);

        return $project;
    }
}