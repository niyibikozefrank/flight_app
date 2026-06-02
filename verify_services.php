<?php
// Quick verification script
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

$services = DB::table('services')->orderBy('category')->get();
echo "Total Services: " . count($services) . "\n";
echo "Services by Category:\n";

$grouped = $services->groupBy('category');
foreach ($grouped as $category => $items) {
    echo "\n[$category]\n";
    foreach ($items as $service) {
        echo "  ✓ " . $service->name . "\n";
    }
}
