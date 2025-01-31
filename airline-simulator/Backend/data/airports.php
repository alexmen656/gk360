<?php
// Setze die Header, um CORS zu erlauben
header("Access-Control-Allow-Origin: *"); // Ermöglicht den Zugriff von allen Ursprüngen
header("Content-Type: application/json"); // Setzt den Content-Type auf JSON

// Der Pfad zur JSON-Datei
$json_file_path = 'airports.json';

// Überprüfe, ob die Datei existiert
if (file_exists($json_file_path)) {
    // Lese die Datei und gebe sie aus
    $json_data = file_get_contents($json_file_path);
    echo $json_data;
} else {
    // Fehlerbehandlung, falls die Datei nicht existiert
    echo json_encode(['error' => 'Datei nicht gefunden']);
}
?>
