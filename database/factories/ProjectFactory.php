<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProjectFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->boolean()
                ? fake()->paragraph()
                : null,
            'main_image' => fake()->imageUrl(480, 480, 'animals', true),
            'release_date' => fake()->date(),
            'repo_link' => fake()->url(),
        ];
    }
}
