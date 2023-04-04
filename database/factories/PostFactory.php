<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $name = $this->faker->unique()->sentence();
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "extract" => $this->faker->text(200),
            "body" => $this->faker->text(2000),
            "status" => $this->faker->randomElement([1,2]),
            "category_id" => Category::all()->random()->id,
            "user_id" => User::all()->random()->id,
        ];
    }
}
