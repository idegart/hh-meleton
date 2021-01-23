<?php

use App\Http\Controllers\ProjectArticleController;
use App\Http\Controllers\ProjectUserController;

Route::post('project-articles/{projectArticle}/files', [ProjectArticleController::class, 'uploadFiles'])
    ->name('projectArticle.uploadFiles');

Route::post('project-users/{projectUser}/files', [ProjectUserController::class, 'uploadFiles'])
    ->name('projectUser.uploadFiles');
