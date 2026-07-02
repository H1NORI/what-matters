<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
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
            'date' =>  $this->faker->date('Y-m-d'),
            'title' =>  $this->faker->words(3, true),
            'description' =>  $this->faker->text(),
            'is_recurring' =>  $this->faker->boolean(),
            'recurring_rule' =>  '',
        ];
    }
}
