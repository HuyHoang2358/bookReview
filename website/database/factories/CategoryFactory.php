<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'icon' => fake()->imageUrl(),
            'status' =>fake()->boolean(),
            'parent_id' => 0,
        ];
    }
}
