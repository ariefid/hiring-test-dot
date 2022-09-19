<?php

namespace Database\Factories;

use App\Enums\TodoState;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'state' => collect([TodoState::DRAFT, TodoState::PUBLISH])->random(),
            'is_private' => fake()->boolean(10),
            'name' => fake()->realTextBetween(10, 30),
            'description' => fake()->realTextBetween(100, 200),
        ];
    }
}
