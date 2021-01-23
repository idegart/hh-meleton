<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\ProjectArticle;
use App\Models\ProjectUser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function can_attach_project_article(): void
    {
        /** @var Project $project */
        $project = Project::factory()->create();

        /** @var ProjectArticle $projectArticle */
        $projectArticle = ProjectArticle::factory()->create();

        $this->postJson(route('project.attachProjectArticle', compact('project', 'projectArticle')))
            ->assertSuccessful();

        self::assertNotNull($project->contents()->get());
    }

    /** @test **/
    public function can_attach_project_user(): void
    {
        /** @var Project $project */
        $project = Project::factory()->create();

        /** @var ProjectUser $projectUser */
        $projectUser = ProjectUser::factory()->create();

        $this->postJson(route('project.attachProjectUser', compact('project', 'projectUser')))
            ->assertSuccessful();

        self::assertNotNull($project->contents()->get());
    }
}
