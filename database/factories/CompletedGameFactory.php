<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompletedGame;

class CompletedGameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompletedGame::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(4),
            'slug' => $this->faker->slug(),
            'thumbnail' => $this->faker->imageUrl(),
            'year' => $this->faker->year(),
        ];
    }
}
