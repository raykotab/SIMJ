<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Database\Seeders\AttendeeSeeder;
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
    public function definition(): array
    {
        $event = fake()->dateTimeBetween('+1 day', '+30 days');

        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'event_date' => $event,
            'event_begins' => $event,
            'event_ends' => fake()->dateTimeBetween('+31 day', '+60 days'),
            'creator_id' => User::factory()->create()->id, //->make(),
            'editor_id' => random_int(1, 20)
        ];
    }
}
