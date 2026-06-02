<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=airport', 'root', '');
$result = $pdo->query('DESCRIBE flights');
$columns = $result->fetchAll(PDO::FETCH_ASSOC);
echo "Flights Table Columns:\n";
echo "=======================\n";
foreach ($columns as $col) {
    echo $col['Field'] . " - " . $col['Type'] . " - Null: " . $col['Null'] . "\n";
}
?>
