<?php

namespace Database\Factories;

use App\Models\EventType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventType>
 */
class EventTypeFactory extends Factory
{
    protected $model = EventType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'event_id' => \random_int(1, 20),
            'background' => '#' . \substr(\md5(\rand()), 0, 6),
            'border' => '#' . \substr(\md5(\rand()), 0, 6),
            'text_color' => '#' . \substr(\md5(\rand()), 0, 6)
        ];
    }
}
