<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectArticle\UploadFileRequest;
use App\Models\ProjectArticle;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;

class ProjectArticleController extends Controller
{
    public function uploadFiles(
        UploadFileRequest $request,
        ProjectArticle $projectArticle,
        ProjectService $projectService
    ): JsonResponse
    {
        $media = $projectService->attachFilesToProjectArticle(
            $projectArticle,
            $request->file('files')
        );

        return $this->successResponse(compact('media'));
    }
}
