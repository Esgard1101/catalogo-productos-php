<?php
$configs = [
    ['host' => '127.0.0.1', 'port' => '3307', 'user' => 'root', 'pass' => '05kl8KCwZb9K5zHR', 'desc' => 'Port 3307, New Password'],
    ['host' => 'localhost', 'port' => '3307', 'user' => 'root', 'pass' => '05kl8KCwZb9K5zHR', 'desc' => 'Localhost 3307, New Password'],
    ['host' => '127.0.0.1', 'port' => '3306', 'user' => 'root', 'pass' => '05kl8KCwZb9K5zHR', 'desc' => 'Port 3306, New Password'],
    ['host' => '127.0.0.1', 'port' => '3306', 'user' => 'root', 'pass' => '', 'desc' => 'Port 3306, No Password (Default XAMPP)'],
    ['host' => '127.0.0.1', 'port' => '3306', 'user' => 'root', 'pass' => 'root', 'desc' => 'Port 3306, Pass "root"'],
];

echo "Starting Connectivity Tests...\n";

foreach ($configs as $cfg) {
    echo "Testing: {$cfg['desc']} ... ";
    try {
        $dsn = "mysql:host={$cfg['host']};port={$cfg['port']};charset=utf8mb4";
        $conn = new PDO($dsn, $cfg['user'], $cfg['pass']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "SUCCESS!\n";
    } catch (PDOException $e) {
        echo "FAILED. (" . $e->getMessage() . ")\n";
    }
}
?>