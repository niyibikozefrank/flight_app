<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroundService;

class GroundServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Passenger Services
            [
                'name' => 'Passenger check-in',
                'category' => 'Passenger Services',
                'description' => 'Passenger check-in services at airport counters',
                'price' => 0,
            ],
            [
                'name' => 'Boarding services',
                'category' => 'Passenger Services',
                'description' => 'Passenger boarding and gate management services',
                'price' => 0,
            ],
            [
                'name' => 'Passenger transportation',
                'category' => 'Transportation Services',
                'description' => 'Ground transportation for passengers between terminals and gates',
                'price' => 25.00,
            ],
            [
                'name' => 'Shuttle bus services',
                'category' => 'Transportation Services',
                'description' => 'Shuttle bus services for passengers',
                'price' => 30.00,
            ],
            [
                'name' => 'VIP passenger services',
                'category' => 'Passenger Services',
                'description' => 'Premium services for VIP passengers',
                'price' => 150.00,
            ],
            [
                'name' => 'Disabled passenger assistance',
                'category' => 'Passenger Services',
                'description' => 'Special assistance for disabled passengers',
                'price' => 0,
            ],

            // Baggage Services
            [
                'name' => 'Baggage handling',
                'category' => 'Baggage Services',
                'description' => 'Baggage loading and unloading services',
                'price' => 15.00,
            ],
            [
                'name' => 'Lost and found services',
                'category' => 'Baggage Services',
                'description' => 'Lost baggage and found items management',
                'price' => 0,
            ],

            // Security Services
            [
                'name' => 'Security screening',
                'category' => 'Security Services',
                'description' => 'Passenger and baggage security screening',
                'price' => 0,
            ],
            [
                'name' => 'Safety inspection services',
                'category' => 'Security Services',
                'description' => 'Aircraft and facility safety inspections',
                'price' => 200.00,
            ],

            // Immigration and Customs Services
            [
                'name' => 'Immigration services',
                'category' => 'Immigration and Customs Services',
                'description' => 'Immigration and passport control services',
                'price' => 0,
            ],
            [
                'name' => 'Customs services',
                'category' => 'Immigration and Customs Services',
                'description' => 'Customs inspection and clearance services',
                'price' => 0,
            ],

            // Aircraft Ground Handling Services
            [
                'name' => 'Aircraft parking',
                'category' => 'Aircraft Ground Handling Services',
                'description' => 'Aircraft parking and positioning services',
                'price' => 100.00,
            ],
            [
                'name' => 'Aircraft marshalling',
                'category' => 'Aircraft Ground Handling Services',
                'description' => 'Aircraft marshalling and guidance services',
                'price' => 50.00,
            ],
            [
                'name' => 'Pushback and towing',
                'category' => 'Aircraft Ground Handling Services',
                'description' => 'Aircraft pushback and towing services',
                'price' => 250.00,
            ],
            [
                'name' => 'Aircraft maintenance support',
                'category' => 'Maintenance Services',
                'description' => 'Ground support for aircraft maintenance',
                'price' => 300.00,
            ],
            [
                'name' => 'Ground power supply',
                'category' => 'Aircraft Ground Handling Services',
                'description' => 'Ground power supply unit (GPU) services',
                'price' => 75.00,
            ],

            // Fuel Services
            [
                'name' => 'Aircraft refueling',
                'category' => 'Fuel Services',
                'description' => 'Aircraft refueling and fuel management',
                'price' => 0,
            ],

            // Cargo Services
            [
                'name' => 'Cargo handling',
                'category' => 'Cargo Services',
                'description' => 'Cargo loading, unloading and management',
                'price' => 200.00,
            ],

            // Ramp Services
            [
                'name' => 'Ramp handling',
                'category' => 'Ramp Services',
                'description' => 'Ramp services and aircraft positioning',
                'price' => 150.00,
            ],

            // Transportation Services
            [
                'name' => 'Air traffic communication support',
                'category' => 'Transportation Services',
                'description' => 'Communication support for air traffic operations',
                'price' => 100.00,
            ],

            // Emergency and Safety Services
            [
                'name' => 'Emergency medical services',
                'category' => 'Emergency and Safety Services',
                'description' => 'Emergency medical response and first aid',
                'price' => 0,
            ],
            [
                'name' => 'Fire and rescue services',
                'category' => 'Emergency and Safety Services',
                'description' => 'Fire and rescue emergency response services',
                'price' => 0,
            ],

            // Maintenance Services
            [
                'name' => 'Runway maintenance',
                'category' => 'Maintenance Services',
                'description' => 'Runway and taxiway maintenance services',
                'price' => 400.00,
            ],

            // Cleaning Services
            [
                'name' => 'Aircraft cleaning',
                'category' => 'Cleaning Services',
                'description' => 'Interior and exterior aircraft cleaning',
                'price' => 200.00,
            ],
            [
                'name' => 'Terminal cleaning',
                'category' => 'Cleaning Services',
                'description' => 'Terminal building cleaning and maintenance',
                'price' => 150.00,
            ],
            [
                'name' => 'Waste management',
                'category' => 'Cleaning Services',
                'description' => 'Waste collection and management services',
                'price' => 100.00,
            ],

            // Information Services
            [
                'name' => 'Flight information services',
                'category' => 'Passenger Services',
                'description' => 'Flight information and announcement services',
                'price' => 0,
            ],

            // Catering Services
            [
                'name' => 'Catering services',
                'category' => 'Catering Services',
                'description' => 'In-flight catering and food services',
                'price' => 0,
            ],

            // Parking Services
            [
                'name' => 'Parking services',
                'category' => 'Transportation Services',
                'description' => 'Passenger vehicle parking services',
                'price' => 20.00,
            ],
        ];

        foreach ($services as $service) {
            GroundService::updateOrCreate(
                ['name' => $service['name']],
                $service
            );
        }
    }
}
