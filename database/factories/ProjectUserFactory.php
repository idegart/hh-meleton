<?php

namespace Database\Factories;

use App\Models\ProjectUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name,
            'headline' => $this->faker->sentence,
        ];
    }
}
