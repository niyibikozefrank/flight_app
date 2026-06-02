<?php

namespace Database\Factories;

use App\Models\Gate;
use Illuminate\Database\Eloquent\Factories\Factory;

class GateFactory extends Factory
{
    protected $model = Gate::class;

    public function definition(): array
    {
        return [
            'gate_number' => 'Gate ' . $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']) . $this->faker->randomNumber(2, true),
            'terminal' => $this->faker->randomElement(['Terminal 1', 'Terminal 2', 'Terminal 3']),
            'capacity' => $this->faker->randomElement([150, 200, 250, 300, 350]),
        ];
    }
}
