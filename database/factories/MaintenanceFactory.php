<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MaintenanceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'maintenance_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'maintenance_type' => $this->faker->randomElement(['Cambio de aceite', 'Cambio de cubiertas', 'Cambio de frenos']),
            'kilometers' => $this->faker->numberBetween(0, 10000),
        ];
    }
}