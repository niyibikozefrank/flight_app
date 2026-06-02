<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $services = [
            ['name' => 'Passenger check-in', 'category' => 'Check-in & Boarding', 'description' => 'Counter and online check-in services for passengers'],
            ['name' => 'Boarding services', 'category' => 'Check-in & Boarding', 'description' => 'Boarding gate operations and passenger boarding procedures'],
            ['name' => 'Security screening', 'category' => 'Security', 'description' => 'Baggage and passenger security screening services'],
            ['name' => 'Immigration services', 'category' => 'Immigration & Customs', 'description' => 'Immigration control and document verification'],
            ['name' => 'Customs clearance', 'category' => 'Immigration & Customs', 'description' => 'Customs inspection and duty clearance services'],
            ['name' => 'Baggage handling', 'category' => 'Baggage & Cargo', 'description' => 'Baggage collection, loading, and handling services'],
            ['name' => 'Air traffic control', 'category' => 'Operations', 'description' => 'Air traffic management and flight coordination'],
            ['name' => 'Flight operations management', 'category' => 'Operations', 'description' => 'Flight scheduling, coordination, and dispatch services'],
            ['name' => 'Aircraft maintenance', 'category' => 'Operations', 'description' => 'Aircraft inspection, maintenance, and repair services'],
            ['name' => 'Ground handling', 'category' => 'Operations', 'description' => 'Aircraft ground support and handling services'],
            ['name' => 'Aircraft fueling', 'category' => 'Operations', 'description' => 'Fuel supply and refueling services for aircraft'],
            ['name' => 'Emergency and medical services', 'category' => 'Emergency', 'description' => 'Emergency medical response and airport medical facilities'],
            ['name' => 'Airport security and police', 'category' => 'Security', 'description' => 'Security personnel and police services'],
            ['name' => 'Cargo handling', 'category' => 'Baggage & Cargo', 'description' => 'Cargo processing, storage, and handling services'],
            ['name' => 'Information/customer support', 'category' => 'Customer Services', 'description' => 'Information counters and customer assistance services'],
            ['name' => 'Transportation and parking services', 'category' => 'Transportation', 'description' => 'Ground transportation, parking, and shuttle services'],
            ['name' => 'Flight information systems', 'category' => 'Systems', 'description' => 'Flight information display systems and announcements'],
            ['name' => 'VIP and lounge services', 'category' => 'Customer Services', 'description' => 'Premium lounge access and VIP passenger services'],
            ['name' => 'Restaurants and duty-free shops', 'category' => 'Retail', 'description' => 'Food court, restaurants, and duty-free retail services'],
            ['name' => 'Wi-Fi and communication services', 'category' => 'Customer Services', 'description' => 'Internet connectivity and communication services'],
        ];

        // Insert services only if they don't exist to avoid duplicates
        foreach ($services as $service) {
            DB::table('services')->updateOrInsert(
                ['name' => $service['name']],
                array_merge($service, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }

    public function down(): void
    {
        // Remove the services we added
        $serviceNames = [
            'Passenger check-in',
            'Boarding services',
            'Security screening',
            'Immigration services',
            'Customs clearance',
            'Baggage handling',
            'Air traffic control',
            'Flight operations management',
            'Aircraft maintenance',
            'Ground handling',
            'Aircraft fueling',
            'Emergency and medical services',
            'Airport security and police',
            'Cargo handling',
            'Information/customer support',
            'Transportation and parking services',
            'Flight information systems',
            'VIP and lounge services',
            'Restaurants and duty-free shops',
            'Wi-Fi and communication services',
        ];

        DB::table('services')->whereIn('name', $serviceNames)->delete();
    }
};
