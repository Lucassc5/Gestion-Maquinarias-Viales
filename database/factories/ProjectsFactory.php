<?php

namespace Database\Factories;

use App\Models\Provinces;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_name' => $this->faker->randomElement(['Asfaltado', 'Reasfaltado', 'Señalizacion', 'Construccion']),
            'province_id' => Provinces::inRandomOrder()->first()->id,
            'planned_start_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'planned_end_date' => $this->faker->dateTimeBetween('+1 year', '+2 years'),
        ];
    }
}
