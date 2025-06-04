<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Machine;
use App\Models\Projects;
use App\Models\Reason;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MachineProjectsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'reason_id' => Reason::inRandomOrder()->first()->id,
            'kilometers' => $this->faker->numberBetween(0, 10000),
            
            'machine_id' => Machine::inRandomOrder()->first()->id,
            'project_id' => Projects::inRandomOrder()->first()->id,
        ];
    }
}
