<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectArticle;
use App\Models\ProjectContent;
use App\Models\ProjectUser;
use Illuminate\Support\Collection;
use RuntimeException;

class ProjectService
{
    public function attachFilesToProjectArticle(ProjectArticle $projectArticle, array $files): Collection
    {
        $media = collect();

        foreach ($files as $file) {
            $media->push(
                $projectArticle->addMedia($file)
                    ->toMediaCollection()
            );
        }

        return $media;
    }

    public function attachFilesToProjectUser(ProjectUser $projectUser, array $files): Collection
    {
        $media = collect();

        foreach ($files as $file) {
            $media->push(
                $projectUser->addMedia($file)
                    ->toMediaCollection()
            );
        }

        return $media;
    }

    public function attachProjectArticle(Project $project, ProjectArticle $projectArticle): ProjectContent
    {
        $content = new ProjectContent;
        $content->content()->associate($projectArticle);

        /** @var ProjectContent $projectContent */
        $projectContent = $project->contents()->save($content);

        if (!$projectContent) {
            throw new RuntimeException("Project content not created");
        }

        return $projectContent;
    }

    public function attachProjectUser(Project $project, ProjectUser $projectUser): ProjectContent
    {
        $content = new ProjectContent;
        $content->content()->associate($projectUser);

        /** @var ProjectContent $projectContent */
        $projectContent = $project->contents()->save($content);

        if (!$projectContent) {
            throw new RuntimeException("Project content not created");
        }

        return $projectContent;
    }
}