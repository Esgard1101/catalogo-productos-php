<?php
// Check DB existence on Port 3306
$host = '127.0.0.1';
$port = '3306';
$user = 'root';
$pass = '05kl8KCwZb9K5zHR';

echo "Checking for 'catalogo_productos' on $host:$port...\n";

try {
    $dsn = "mysql:host=$host;port=$port;charset=utf8mb4";
    // Connect without DB name first
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SHOW DATABASES LIKE 'catalogo_productos'");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo "FOUND: Database 'catalogo_productos' exists on port $port.\n";
    } else {
        echo "NOT FOUND: Database 'catalogo_productos' does NOT exist on port $port.\n";
        echo "Databases found: \n";
        $all = $conn->query("SHOW DATABASES")->fetchAll(PDO::FETCH_COLUMN);
        print_r($all);
    }

} catch (PDOException $e) {
    echo "ERROR: Could not connect to check databases. " . $e->getMessage() . "\n";
}
?>