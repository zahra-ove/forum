<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'   => Str::of($this->faker->sentence())->before('.'),
            'body'    => $this->faker->realText($this->faker->numberBetween(1000, 65000)),
            'user_id' => User::factory()
        ];
    }
}
