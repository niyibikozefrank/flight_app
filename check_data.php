<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=airport', 'root', '');

echo "Passengers:\n";
$result = $pdo->query('SELECT id, name FROM passengers LIMIT 5');
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
echo count($rows) . " passengers found\n";
foreach ($rows as $row) {
    echo "  - {$row['id']}: {$row['name']}\n";
}

echo "\nStaff:\n";
$result = $pdo->query('SELECT id, name FROM staff LIMIT 5');
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
echo count($rows) . " staff found\n";
foreach ($rows as $row) {
    echo "  - {$row['id']}: {$row['name']}\n";
}

echo "\nGates:\n";
$result = $pdo->query('SELECT id, gate_number FROM gates LIMIT 5');
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
echo count($rows) . " gates found\n";
foreach ($rows as $row) {
    echo "  - {$row['id']}: {$row['gate_number']}\n";
}

echo "\nFlights:\n";
$result = $pdo->query('SELECT COUNT(*) as count FROM flights');
$row = $result->fetch(PDO::FETCH_ASSOC);
echo $row['count'] . " flights in database\n";
?>
