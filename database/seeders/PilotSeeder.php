<?php

namespace Database\Seeders;

use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Staff;
use App\Models\Gate;
use Illuminate\Database\Seeder;

class PilotSeeder extends Seeder
{
    public function run(): void
    {
        // Create pilots/staff
        $pilots = Staff::factory(5)->create();

        // Create passengers
        $passengers = Passenger::factory(20)->create();

        // Create gates
        $gates = Gate::factory(5)->create();

        // Create flights with relationships
        $flightNumbers = ['FL001', 'FL002', 'FL003', 'FL004', 'FL005', 'FL006', 'FL007', 'FL008'];
        $destinations = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Miami', 'Boston', 'Seattle'];
        $aircrafts = ['Boeing 747', 'Airbus A380', 'Boeing 787', 'Airbus A350', 'Embraer E190'];

        foreach ($flightNumbers as $index => $flightNumber) {
            Flight::factory()->create([
                'flight_number' => $flightNumber,
                'passenger_id' => $passengers->random()->id,
                'staff_id' => $pilots->random()->id,
                'gate_id' => $gates->random()->id,
                'destination' => $destinations[$index],
                'aircraft_type' => $aircrafts[$index % count($aircrafts)],
                'price' => rand(150, 800),
                'status' => ['scheduled', 'boarding', 'departed', 'delayed'][rand(0, 3)],
            ]);
        }
    }
}
