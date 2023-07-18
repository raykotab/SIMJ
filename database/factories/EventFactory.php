<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $event = fake()->dateTimeBetween('+1 day', '+30 days');
        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'event_date' => $event,
            'event_begins' => $event,
            'event_ends' => fake()->dateTimeBetween('+31 day', '+60 days'),
            'creator_id' => random_int(1, 20),
            'editor_id' => random_int(1, 20)
        ];
    }
}
