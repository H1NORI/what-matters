<?php

namespace Database\Factories;

use App\Models\Fact;
use App\Models\Memory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fact>
 */
class FactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'memory_id' => Memory::factory(),
            'type' => $this->faker->randomElement(['preference', 'dream', 'dislike',]),
            'attribute' => $this->faker->word(),
            'value' => $this->faker->word(),
        ];
    }
}
