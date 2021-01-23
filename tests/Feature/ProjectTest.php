<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\ProjectArticle;
use App\Models\ProjectUser;
use App\Services\ProjectService;
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

    /** @test **/
    public function can_get_project_data(): void
    {
        /** @var Project $project */
        $project = Project::factory()->create();

        /** @var ProjectArticle $projectArticle */
        $projectArticle = ProjectArticle::factory()->create();

        /** @var ProjectUser $projectUser */
        $projectUser = ProjectUser::factory()->create();

        $projectService = new ProjectService();

        $projectService->attachProjectArticle($project, $projectArticle);
        $projectService->attachProjectUser($project, $projectUser);

        $this->getJson(route('projects.show', compact('project')))
            ->assertSuccessful()
            ->assertJsonFragment([
                'title' => $project->title,
                'description' => $project->description,
            ])
            ->assertJsonCount(2, 'data.contents')
            ->assertJsonFragment([
                'title' => $projectArticle->title,
                'content' => $projectArticle->content,
            ])
            ->assertJsonFragment([
                'headline' => $projectUser->headline,
                'first_name' => $projectUser->first_name,
            ]);
    }
}
