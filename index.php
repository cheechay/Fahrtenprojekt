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
    $uhrzeit_von = filter_input(INPUT_POST, 'uhrzeit_von',  FILTER_DEFAULT);
    $uhrzeit_bis = filter_input(INPUT_POST, 'uhrzeit_bis',  FILTER_DEFAULT);
    $kmdiff = filter_input(INPUT_POST, 'kmdiff',  FILTER_DEFAULT);
    // Get form data using filter_input() for sanitization


    // kmdiff nochmal in hintergrund berechnet, um sicher zu stellen
    $kmdiff= $km_end-$km_start;

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
    $entry->appendChild($xml->createElement("Km_end", htmlspecialchars($km_end)));
    $entry->appendChild($xml->createElement("Kmdiff", htmlspecialchars($kmdiff)));

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
    <link rel="stylesheet" href="output.css">
    <style>
        .container{
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px black ;
        }
        
        a{
            padding-left: 20px;
            padding-right: 20px;
        }
        
        h1{
            margin: 0;
            font-size: 40px;
            color: black;
            text-align: center;
            width: 780px;
            padding: 10px;
            margin-bottom: 20px;
            background-color:#54565865;
            border-radius: 10px 10px 0 0;
 
        }
        fieldset{
         padding: 20px;
         border: 2px solid;
         border-radius: 0 0 10px 10px;
        }
        legend{
         font-size: large;
         font-weight: bold;
        }
        button{
            padding: 5px;
            width: 200px;
            background-color: rgba(114, 117, 119, 0.616);
            float: left;
            margin-top: 30px;
            margin-left: 120px;
            border-radius: 5px;
        }


        th{
           text-align: left;
        }
        label,p{
         font-size: 14px;
         font-weight: bold;
         vertical-align: middle;
        }
        .photo{
            text-align: center;
        }

    </style>
    </head>
    <body>
    <div class="container">
    <h1>Fahrtenbuch - Project </h1>
    <fieldset>
    <legend>Vielen Dank!!</legend>
    <p style="text-align:center; margin-top:40px;">Die Eingabe ist erfolgreich abgeschlossen......</p>
    <div class="photo"><img src="smile.jpg" alt="smile" height="45" >
    <img src="smile.jpg" alt="smile" height="45" >
    <img src="smile.jpg" alt="smile" height="45" >
    </div>
    <hr>
    <p>Wie möchten Sie weiter machen?</p>
    <table>
        <tr>
            <td><label for="home">a.Neuer Eintrag</label></td>
            <td>
            <form action="index.html">
            <button type="submit" id="home" > Formular</button>
            </form>
            </td>
        </tr>
        <tr>
            <td><label for="xml_datei">b.Als XML-Liste anschauen</label></td>
            <td><form action="fahrtenbuch.xml">
            <button type="submit" id="xml_datei" > XML Datei</button>
            </form>
            </td>
        </tr>
        <tr>
            <td><label for="liste">c.Alle Fahrten listen anschauen</label></td>
            <td><form action="index.php">
            <button class='button' role="button" id="button">Fahrtenbuch</button>
            </form> 
            </td>
        </tr>
    </table>
    </fieldset>
    </div>


​‌‌‍⁡⁣⁣⁢‍<!-- 𝗼𝘂𝘁𝗽𝘂𝘁s -->⁡​

<div class="liste table_output">
<table id = 'table_output'>
        <thead>
            <th>Name</th>
            <th>Wohnort</th>
            <th>Zweck</th>
            <th>Datum</th>
            <th>Kilometer Start</th>
            <th>Kilometer Ende</th>
            <th>Kilometer Differenz</th>
        </thead>
        <tbody>
            
            <?php
                $xml = simplexml_load_file('fahrtenbuch.xml') or die("Error: Cannot create object");
                foreach ($xml->fahrten as $fahrt) {
                    $name = $fahrt->name;
                    $wohnort = $fahrt->wohnort;
                    $zweck = $fahrt->zweck;
                    $datum = $fahrt->datum;
                    $km_start = $fahrt->km_start;
                    $km_end = $fahrt->Km_end;
                    $kmdiff = $fahrt->Kmdiff;

                    echo "<tr>
                            <td>$name</td>
                            <td>$wohnort</td>
                            <td>$zweck</td>
                            <td>$datum</td>
                            <td>$km_start</td>
                            <td>$km_end</td>
                            <td>$kmdiff</td>
                          </tr>";
                }
            ?>
        </tbody>
    </table>
</div>


    </body>

    <script>

const button = document.querySelector('.button');
const tableBody = document.querySelector('.table_output');

button.addEventListener('click', function() {
   
    if (tableBody.classList.contains('liste')) {
      // If the table body already has the 'liste' class, remove it
      tableBody.classList.remove('liste');
      console.log('test');
      tableBody.classList.add('table_output');
    } else {
      // Otherwise, add the 'liste' class
      tableBody.classList.add('liste');
    }
  });

 

    </script>
</html>
