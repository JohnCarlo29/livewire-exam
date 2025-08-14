<?php

namespace App\Actions\Projects;

use App\Models\Project;

class CreateProject
{
    public function execute(array $data): Project
    {
        return Project::create($data);
    }
}
