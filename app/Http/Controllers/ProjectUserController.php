<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectArticle\UploadFileRequest;
use App\Models\ProjectUser;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;

class ProjectUserController extends Controller
{
    public function uploadFiles(
        UploadFileRequest $request,
        ProjectUser $projectUser,
        ProjectService $projectService
    ): JsonResponse
    {
        $media = $projectService->attachFilesToProjectUser(
            $projectUser,
            $request->file('files')
        );

        return $this->successResponse(compact('media'));
    }
}
