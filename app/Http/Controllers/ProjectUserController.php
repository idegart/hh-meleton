<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectArticle\UploadFileRequest;
use App\Http\Resources\MediaResource;
use App\Models\ProjectUser;
use App\Services\ProjectService;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectUserController extends Controller
{
    public function uploadFiles(
        UploadFileRequest $request,
        ProjectUser $projectUser,
        ProjectService $projectService
    ): JsonResource
    {
        $media = $projectService->attachFilesToProjectUser(
            $projectUser,
            $request->file('files')
        );

        return MediaResource::collection($media);
    }
}
