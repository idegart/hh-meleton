<?php

use App\Http\Controllers\ProjectArticleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;

Route::post('project-articles/{projectArticle}/files', [ProjectArticleController::class, 'uploadFiles'])
    ->name('projectArticle.uploadFiles');

Route::post('project-users/{projectUser}/files', [ProjectUserController::class, 'uploadFiles'])
    ->name('projectUser.uploadFiles');

Route::post('projects/{project}/project-articles/{projectArticle}', [ProjectController::class, 'attachProjectArticle'])
    ->name('project.attachProjectArticle');

Route::post('projects/{project}/project-users/{projectUser}', [ProjectController::class, 'attachProjectUser'])
    ->name('project.attachProjectUser');
