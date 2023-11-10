<?php

namespace Database\Factories;

use App\Models\Colony;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ant>
 */
class AntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'colony_id' => $this->firstOrCreateColonyId(),
        ];
    }

    public function firstOrCreateColonyId(): int
    {
        return Colony::query()->inRandomOrder()->first()?->id ??
            Colony::factory()->createOne()->id;
    }
}
