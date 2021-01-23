<?php

namespace Tests\Feature;

use App\Models\ProjectArticle;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProjectArticleTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function can_upload_file_to_project_article(): void
    {
        Storage::fake('public');

        $projectArticle = ProjectArticle::factory()->create();

        $files = [
            UploadedFile::fake()->image('avatar1.jpg'),
            UploadedFile::fake()->image('avatar2.jpg')
        ];

        $response = $this->postJson(
            route('projectArticle.uploadFiles', compact('projectArticle')),
            compact('files')
        )
            ->assertSuccessful();

        foreach ($response->json('data') as $mediaFile) {
            Storage::disk($mediaFile['disk'])
                ->assertExists("{$mediaFile['id']}/{$mediaFile['file_name']}");
        }
    }
}
