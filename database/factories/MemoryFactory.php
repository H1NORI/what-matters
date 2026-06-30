<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Memory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Memory>
 */
class MemoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contact_id' => Contact::factory(),
            'content' => $this->faker->realText(100),
        ];
    }
}
