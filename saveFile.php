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
    <title>Erfolgreich speichert</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <header>
    <div class="logo"><img src="logo.png" alt="" width="95px ">
            <h2>Fahrtenbuch</h2>
        </div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="index.html">Eintrag</a></li>
                <li><a href="ausgabe.php">List</a></li>

            </ul>
        </nav>
    </header>

    <div class="container">
        <div style="display: flex; align-items: center; text-align: center; padding:30px;">
            <i class="fa-regular fa-pen-to-square" style="font-size: 24px; margin-right: 10px;"></i>
            <hr style="flex: 1; border: 0.5px solid #000; margin: 0 10px;">
            <i class="fa-regular fa-circle-question" style="font-size: 24px; margin-right: 10px;"></i>
            <hr style="flex: 1; border: 0.5px solid #000; margin: 0 10px;">
            <i class="fa-solid fa-pen" style="font-size: 24px; margin-right: 10px;"></i>
            <hr style="flex: 1; border: 0.1px solid #000; margin: 0 10px;">
            <i class="fa-regular fa-circle-check" style="font-size:44px; margin-right: 10px; color:green;"></i>
        </div>
        <fieldset>
            <legend>Vielen Dank</legend>
            <p style="text-align:center; margin-top:40px;">Die Eingabe ist erfolgreich abgeschlossen.</p>
            <div class="photo" style="text-align:center;">
            <video  alt="applause" height="55" autoplay><source src="clap.mp4" type="video/mp4"></video>
            </div>
            <hr>
            <p>Wie möchten Sie weiter machen?</p>
            <table>
                <tr>
                    <td>
                        <form action="index.html">
                            <button type="submit" id="home" style="flex:left; margin-left:-10px;"> Formular <i
                                    class="fa-regular fa-pen-to-square"></i></button>
                        </form>
                    </td>

                    <td>
                        <form action="fahrtenbuch.xml">
                            <button type="submit" id="xml_datei" style="margin-left:40px; "> XML Datei 
                                <i class="fa-regular fa-file-code"></i> </button>
                        </form>
                    </td>

                    <td>
                        <form action="ausgabe.php">
                            <button class='button' role="button" id="button"
                                style="flex:right; margin-left:-10px;">Fahrtenbuch 
                                <i class="fa-solid fa-book"></i></button>
                        </form>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
    <footer>
        <p>&copy;</p>
    </footer>
</body>
</html>

​‌‌‍