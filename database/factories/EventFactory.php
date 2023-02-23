<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
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
            "title" => $this->faker->words(3,true),
            "start_date" => $this->faker->dateTimeBetween('-1 month',"now"),
            "end_date" => $this->faker->dateTimeBetween('now',"+2 month"),
        ];
    }
}
