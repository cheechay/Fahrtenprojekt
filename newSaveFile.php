<?php
$xmlFile = 'fahrtenbuch.xml';
$xml = simplexml_load_file($xmlFile);

// letze Einträge Kontrolle
$totalEntries = count($xml->fahrten);
$lastEntry = $xml->fahrten[$totalEntries - 1];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // nimmt die neue geänderte Datein
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $wohnort = filter_input(INPUT_POST, 'wohnort', FILTER_SANITIZE_STRING);
    $zweck = filter_input(INPUT_POST, 'zweck', FILTER_SANITIZE_STRING);
    $datum = filter_input(INPUT_POST, 'datum', FILTER_SANITIZE_STRING);
    $km_start = filter_input(INPUT_POST, 'km_start', FILTER_VALIDATE_INT);
    $km_end = filter_input(INPUT_POST, 'km_end', FILTER_VALIDATE_INT);
    $uhrzeit_von = filter_input(INPUT_POST, 'uhrzeit_von', FILTER_SANITIZE_STRING);
    $uhrzeit_bis = filter_input(INPUT_POST, 'uhrzeit_bis', FILTER_SANITIZE_STRING);

    // Rechnet die kmdiff
    $kmdiff = $km_end - $km_start;

    // Update the XML object
    $lastEntry->name = $name;
    $lastEntry->wohnort = $wohnort;
    $lastEntry->zweck = $zweck;
    $lastEntry->datum = $datum;
    $lastEntry->km_start = $km_start;
    $lastEntry->km_end = $km_end;
    $lastEntry->uhrzeit_von = $uhrzeit_von;
    $lastEntry->uhrzeit_bis = $uhrzeit_bis;
    $lastEntry->kmdiff = $kmdiff;

    // in XML gespeichert
    $xml->asXML($xmlFile);

    // geht direkt zu Ausgabe Formular
    header('Location: ausgabe.php');
    exit;
}
?>