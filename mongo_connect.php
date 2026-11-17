<?php
require 'vendor/autoload.php'; // If using Composer

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->hostel_management; // Your database name
    echo "MongoDB connected successfully.";
} catch (Exception $e) {
    die("Error connecting to MongoDB: " . $e->getMessage());
}
?>
