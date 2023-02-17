<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProjectFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->unique()->words(rand(1, 5), true),
            'description' => fake()->boolean()
                ? fake()->paragraph()
                : null,
            'main_image' => fake()->unique()->imageUrl(480, 480, 'animals', true),
            'release_date' => fake()->date(),
            'repo_link' => fake()->unique()->url(),
        ];
    }
}
