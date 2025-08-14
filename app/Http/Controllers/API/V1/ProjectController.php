<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Projects\CreateProject;
use App\Actions\Projects\DeleteProject;
use App\Actions\Projects\ListProject;
use App\Actions\Projects\UpdateProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = new ListProject()->execute(request('search'));

        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new CreateProject()->execute($request->validated());

        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $updatedProject = new UpdateProject()->execute($project, $request->validated());

        return new ProjectResource($updatedProject);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        new DeleteProject()->execute($project);

        return response()->noContent();
    }
}
