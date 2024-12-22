<?php
// Überprüfen, ob die ID über die URL übergeben wurde
if (isset($_GET['id'])) {
    $id = $_GET['id']; // ID aus der URL holen

    // XML-Datei laden
    $xmlFile = 'fahrtenbuch.xml';
    $xml = simplexml_load_file($xmlFile) or die("Error: Cannot create object");

    // Suche die Fahrt mit der entsprechenden ID
    foreach ($xml->fahrten as $fahrt) {
        if ((string)$fahrt['id'] === $id) {
            // Details der Fahrt anzeigen
            echo "<h1>Details für Fahrt-ID: $id</h1>";
            echo "<p>Name: " . $fahrt->name . "</p>";
            echo "<p>Wohnort: " . $fahrt->wohnort . "</p>";
            echo "<p>Zweck: " . $fahrt->zweck . "</p>";
            echo "<p>Datum: " . $fahrt->datum . "</p>";
            echo "<p>Kilometer Start: " . $fahrt->km_start . "</p>";
            echo "<p>Kilometer Ende: " . $fahrt->km_end . "</p>";
            echo "<p>Kilometer Differenz: " . $fahrt->kmdiff . "</p>";
        }
    }
} else {
    echo "Fahrt-ID nicht gefunden!";
}
?>
