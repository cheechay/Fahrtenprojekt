<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausgabe Fahrtenbuch</title>
    <link rel="stylesheet" href="ausgabe.css">
</head>
<body>
    <div class="out-wrap">
    <table>
        <thead>
               <th>Name</th>
               <th>Wohnort</th>
               <th>Zweck</th>
               <th>Datum</th>
               <th>Uhrzeit Von</th>
               <th>Uhrzeit bis</th>
               <th>Kilometer Start</th>
               <th>Kilometer Ende</th>
               <th>Kilometer Differenz</th>
               <th>Details</th>
               <th>Aktion</th>
           </thead>

            <tbody>

                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        
                        $xmlFile = 'fahrtenbuch.xml';
                    
                        $xml = simplexml_load_file('fahrtenbuch.xml') or die("Error: Cannot create object");

                        $id = isset($fahrt['id']) ? $fahrt['id'] : ''; 
                        $delete_id = isset($fahrt['id']) ? $fahrt['id'] : ''; 
                        

                        $fahrtenArray = [];

                        foreach ($xml->fahrten as $fahrt) {
                            $fahrtenArray[] = $fahrt;
                        }
                        if (isset($_GET['delete_id'])) {
                            $delete_id = $_GET['delete_id'];
    
                            // Durchlaufe das Array und finde den entsprechenden Eintrag
                            foreach ($fahrtenArray as $key => $fahrt) {
                                if ($fahrt['id'] == $delete_id) {
                                    unset($fahrtenArray[$key]); // Lösche den Eintrag
                                    break;
                                }
                            }
    
                            // Schreibe die geänderte XML-Datei zurück
                            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><fahrtenbuch></fahrtenbuch>'); // Leere XML-Struktur
                            foreach ($fahrtenArray as $fahrt) {
                                $fahrten = $xml->addChild('fahrten');
                                $fahrten->addAttribute('id', (string)$fahrt['id']);
                                $fahrten->addChild('name', (string)$fahrt->name);
                                $fahrten->addChild('wohnort', (string)$fahrt->wohnort);
                                $fahrten->addChild('zweck', (string)$fahrt->zweck);
                                $fahrten->addChild('datum', (string)$fahrt->datum);
                                $fahrten->addChild('uhrzeit_vom', (string)$fahrt->uhrzeit_von);
                                $fahrten->addChild('uhrzeit_bis', (string)$fahrt->uhrzeit_bis);
                                $fahrten->addChild('km_start', (string)$fahrt->km_start);
                                $fahrten->addChild('km_end', (string)$fahrt->km_end);
                                $fahrten->addChild('kmdiff', (string)$fahrt->kmdiff);
                            }
    
                            // Speichere die geänderte XML-Datei
                            $xml->asXML($xmlFile);
    
                            // Seite neu laden, um den aktualisierten Stand anzuzeigen
                            header("Location: " . $_SERVER['PHP_SELF']);
                            exit;
                        }


                        foreach ($fahrtenArray as $fahrt) {
                            
                            $id = (string)$fahrt['id'];
                            $name = $fahrt->name;
                            $wohnort = $fahrt->wohnort;
                            $zweck = $fahrt->zweck;
                            $datum = $fahrt->datum;
                            $uhrzeit_von = $fahrt->uhrzeit_von;
                            $uhrzeit_bis = $fahrt->uhrzeit_bis;
                            $km_start = isset($fahrt->km_start) ? $fahrt->km_start : 'N/A'; // Default-Wert, falls kein Wert vorhanden
                            $km_end = isset($fahrt->km_end) ? $fahrt->km_end : 'N/A'; // Default-Wert, falls kein Wert vorhanden
                            $kmdiff = isset($fahrt->kmdiff) ? $fahrt->kmdiff : 'N/A'; // Default-Wert, falls kein Wert vorhanden
                      
                            $tableRow ="
                                    <tr id=\"entry_<?php echo $id; ?>\">
                                        <td><img  width=\"30px\" height=\"30px\" src=\"imgs\/user.png\" alt=\"User Bild\">$name </td>
                                        <td>$wohnort</td>
                                        <td>$zweck</td>
                                        <td>$datum</td>
                                        <td>$uhrzeit_von</td>
                                        <td>$uhrzeit_bis</td>
                                        <td>$km_start</td>
                                        <td>$km_end</td>
                                        <td>$kmdiff</td>
                                        <td><a href=\"detail.php?id=$id\">Detail</a></td>
                                        <td>
                                            <a href='?delete_id=$id' class='btn-delete' onclick='return confirm(\"Möchten Sie diesen Eintrag wirklich löschen?\")'>Delete</a>
                                        </td>
                                      </tr>
                                ";
                                echo $tableRow;
                             
                        }
    }             
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
