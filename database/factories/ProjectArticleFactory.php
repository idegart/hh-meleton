<?php

namespace Database\Factories;

use App\Models\ProjectArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->text,
        ];
    }
}
