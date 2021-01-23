<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectArticle\UploadFileRequest;
use App\Http\Resources\MediaResource;
use App\Models\ProjectArticle;
use App\Services\ProjectService;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectArticleController extends Controller
{
    public function uploadFiles(
        UploadFileRequest $request,
        ProjectArticle $projectArticle,
        ProjectService $projectService
    ): JsonResource
    {
        $media = $projectService->attachFilesToProjectArticle(
            $projectArticle,
            $request->file('files')
        );

        return MediaResource::collection($media);
    }
}
