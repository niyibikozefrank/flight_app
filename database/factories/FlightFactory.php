<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition(): array
    {
        $departure = $this->faker->dateTimeBetween('+1 day', '+30 days');
        $arrival = clone $departure;
        $arrival->modify('+' . rand(2, 12) . ' hours');

        return [
            'flight_number' => 'FL' . $this->faker->randomNumber(4, true),
            'departure_time' => $departure,
            'arrival_time' => $arrival,
            'destination' => $this->faker->randomElement(['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Miami', 'Boston', 'Seattle', 'Denver', 'San Francisco']),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'aircraft_type' => $this->faker->randomElement(['Boeing 747', 'Airbus A380', 'Boeing 787', 'Airbus A350', 'Embraer E190', 'Boeing 737', 'Airbus A321']),
            'capacity' => $this->faker->randomElement([150, 180, 200, 250, 300, 350, 400, 500]),
            'duration_minutes' => $this->faker->randomElement([120, 180, 240, 300, 360, 420, 480, 540, 600]),
            'booking_reference' => strtoupper($this->faker->bothify('??????')),
            'status' => $this->faker->randomElement(['scheduled', 'boarding', 'departed', 'delayed', 'cancelled']),
        ];
    }
}
