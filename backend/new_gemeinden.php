<?php
include 'head.php';
$jsonData = file_get_contents('all.json');
$citiesData = json_decode($jsonData, true);

foreach ($citiesData as $city) {
    $name = escape_string($city['name']);
    $population = (int) $city['population'];
    $district = escape_string($city['bezirk']);
    
    $sql = "INSERT INTO gemeindekompass360_gemeinden (name, einwohnerzahl, bezirk) VALUES ('$name', $population, '$district')";
    
    if (query($sql) === false) {
        echo "Error inserting data!";
    }
}