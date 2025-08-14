<?php

namespace App\Actions\Projects;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

class ListProject
{
    public function execute(?string $keyword = null): LengthAwarePaginator
    {
        return Project::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%'.$keyword.'%');
        })->paginate();
    }
}