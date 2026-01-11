<?php
require_once 'config/Database.php';

echo "Testing Database::getConnection() with new settings...\n";

try {
    $conn = Database::getConnection();
    if ($conn) {
        echo "SUCCESS: Connected to database successfully!\n";

        // Final sanity check: query the db
        $stmt = $conn->query("SELECT DATABASE()");
        $dbName = $stmt->fetchColumn();
        echo "Connected to database: " . $dbName . "\n";
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
?>