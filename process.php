<?php
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $database = $client->selectDatabase("msgftstars");
    $collection = $database->selectCollection("messages");

    $document = [
        'name' => $name,
        'message' => $message,
    ];

    $result = $collection->insertOne($document);

    if ($result->getInsertedCount() > 0) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data.";
    }
}
?>
