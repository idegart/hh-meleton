<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectContentResource;
use App\Models\Project;
use App\Models\ProjectArticle;
use App\Models\ProjectUser;
use App\Services\ProjectService;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectController extends Controller
{
    public function attachProjectArticle(
        Project $project,
        ProjectArticle $projectArticle,
        ProjectService $projectService
    ): JsonResource
    {
        $projectContent = $projectService->attachProjectArticle($project, $projectArticle);

        return new ProjectContentResource($projectContent);
    }

    public function attachProjectUser(
        Project $project,
        ProjectUser $projectUser,
        ProjectService $projectService
    ): JsonResource
    {
        $projectContent = $projectService->attachProjectUser($project, $projectUser);

        return new ProjectContentResource($projectContent);
    }
}
