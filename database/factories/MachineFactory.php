<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => 'SN-' . $this->faker->unique()->bothify('####'),
            'type' => Type::inRandomOrder()->first()->id,
            'model' => $this->faker->numerify('####'),
            'kilometers' => $this->faker->numberBetween(0, 100),

        ];
    }
}
