<?php

namespace Tests\Feature;

use App\Models\ProjectUser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProjectUserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function can_upload_file_to_project_user(): void
    {
        Storage::fake('public');

        $projectUser = ProjectUser::factory()->create();

        $files = [
            UploadedFile::fake()->image('avatar1.jpg'),
            UploadedFile::fake()->image('avatar2.jpg')
        ];

        $response = $this->postJson(
            route('projectUser.uploadFiles', compact('projectUser')),
            compact('files')
        )
            ->assertSuccessful();

        foreach ($response->json('media') as $mediaFile) {
            Storage::disk($mediaFile['disk'])
                ->assertExists("{$mediaFile['id']}/{$mediaFile['file_name']}");
        }
    }
}
