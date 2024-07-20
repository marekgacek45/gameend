<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Post;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(4),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->paragraphs(5, true),
            'thumbnail' => $this->faker->imageUrl(),
            'rating' => $this->faker->numberBetween(1, 5),
            'featured' => $this->faker->boolean(),
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
