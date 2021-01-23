<?php

namespace App\Services;

use App\Models\ProjectArticle;
use App\Models\ProjectUser;
use Illuminate\Support\Collection;

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
}