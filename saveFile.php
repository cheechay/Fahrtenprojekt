<?php

//testen ob Method als POST ist..
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datum = $_POST['datum'];
    $name = $_POST['name']; // $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $wohnort = filter_input(INPUT_POST, 'wohnort', FILTER_DEFAULT);
    $zweck = filter_input(INPUT_POST, 'zweck', FILTER_DEFAULT);
    //$datum = filter_input(INPUT_POST, 'datum', FILTER_DEFAULT);
    $km_start = filter_input(INPUT_POST, 'km_start', FILTER_DEFAULT);
    $km_end = filter_input(INPUT_POST, 'km_end', FILTER_DEFAULT);
    $uhrzeit_von = filter_input(INPUT_POST, 'uhrzeit_von', FILTER_DEFAULT);
    $uhrzeit_bis = filter_input(INPUT_POST, 'uhrzeit_bis', FILTER_DEFAULT);
    $kmdiff = filter_input(INPUT_POST, 'kmdiff', FILTER_DEFAULT);
    // Get form data using filter_input() for sanitization


    // kmdiff nochmal in hintergrund berechnet, um sicher zu stellen
    $kmdiff = $km_end - $km_start;

    // zuerst wird versuch ,ob ein fahrtenbuch.xml File gibt??
    $xmlFile = 'fahrtenbuch.xml';
    if (file_exists($xmlFile)) {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load($xmlFile);
        $xml->preserveWhiteSpace = false;
        $root = $xml->documentElement;
    } else {
        //neue XML File würde erstellt fall nicht vorhandet mit root_Element als fahrtenbuch
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->formatOutput = true;
        $root = $xml->createElement("fahrtenbuch");
        $xml->appendChild($root);
    }


    //  ID berechnen
    $fahrtenElements = $root->getElementsByTagName("fahrten");
    $nextId = $fahrtenElements->length + 1; // Anzahl vorhandener Fahrten + 1

    // Neue Fahrt erstellen
    $entry = $xml->createElement("fahrten");
    $entry->setAttribute("id", $nextId); // ID-Attribut hinzufügen


    // Unterelemente von fahrten erstellen
    $entry->appendChild($xml->createElement("name", htmlspecialchars($name)));
    $entry->appendChild($xml->createElement("wohnort", htmlspecialchars($wohnort)));
    $entry->appendChild($xml->createElement("zweck", htmlspecialchars($zweck)));
    $entry->appendChild($xml->createElement("datum", htmlspecialchars($datum)));
    $entry->appendChild($xml->createElement("uhrzeit_von", htmlspecialchars($uhrzeit_von)));
    $entry->appendChild($xml->createElement("uhrzeit_bis", htmlspecialchars($uhrzeit_bis)));
    $entry->appendChild($xml->createElement("km_start", htmlspecialchars($km_start)));
    $entry->appendChild($xml->createElement("km_end", htmlspecialchars($km_end)));
    $entry->appendChild($xml->createElement("kmdiff", htmlspecialchars($kmdiff)));

    // die Unterelemente werden zu fahrten Elemente zugefügt
    $root->appendChild($entry);

    // Datein würde in XML gespeichert
    $xml->save($xmlFile);
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>Erfolgreich XML speichert</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="container">
        <div class="contheader">
            <h1>Fahrtenbuch - Project </h1>
        </div>
        <fieldset>
            <legend>Vielen Dank</legend>
            <p style="text-align:center; margin-top:40px;">Die Eingabe ist erfolgreich abgeschlossen.</p>
            <div class="photo" style="text-align:center;"><img src="smile.jpg" alt="smile" height="45">

            </div>
            <hr>
            <p>Wie möchten Sie weiter machen?</p>
            <table>
                <tr>
                    <td><label for="home">Neuer Eintrag</label></td>
                    <td>
                        <form action="index.html">
                            <button type="submit" id="home"> Formular</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><label for="xml_datei">Als XML-Liste anschauen</label></td>
                    <td>
                        <form action="fahrtenbuch.xml">
                            <button type="submit" id="xml_datei"> XML Datei</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><label for="liste">Alle Fahrten listen anschauen</label></td>
                    <td>
                        <form action="ausgabe.php">
                            <button class='button' role="button" id="button">Fahrtenbuch</button>
                        </form>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
</body>

</html>

​‌‌‍⁡⁣⁣⁢