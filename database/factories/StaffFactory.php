<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    protected $model = Staff::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'position' => $this->faker->randomElement(['Captain', 'First Officer', 'Flight Engineer', 'Pilot', 'Co-Pilot']),
            'department' => 'Flight Operations',
            'employee_id' => 'EMP' . $this->faker->randomNumber(6, true),
        ];
    }
}
