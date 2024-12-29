<?php
// Prüfe, ob eine ID übergeben wurde
if (isset($_POST['id'])) {
    $delete_id = $_POST['id'];  // Die ID des zu löschenden Eintrags

    // Lade das XML-Dokument
    $xmlFile = 'fahrtenbuch.xml';
    $xml = simplexml_load_file($xmlFile) or die("Error: Cannot create object");

    // Durchlaufe die Fahrten und lösche den Eintrag mit der angegebenen ID
    foreach ($xml->fahrten as $fahrt) {
        if ((string)$fahrt['id'] == $delete_id) {
            // Lösche den Eintrag aus dem XML
            unset($fahrt[0]);
            break;
        }
    }

    // Speichere das geänderte XML
    if ($xml->asXML($xmlFile)) {
        echo "Erfolgreich gelöscht!";
    } else {
        echo "Fehler beim Löschen des Eintrags.";
    }
}
?>
