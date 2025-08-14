<?php

namespace App\Actions\Projects;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ListProject
{
    public function execute(?string $keyword = null): Collection
    {
        return Project::when($keyword, function ($query) {
            $query->where('name', 'like', '%'.request('search').'%');
        })->get();
    }
}