<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $xmlFile = 'fahrtenbuch.xml';

    $xml = simplexml_load_file('fahrtenbuch.xml');

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
                unset($fahrtenArray[$key]);
                break;
            }
        }

        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><fahrtenbuch></fahrtenbuch>'); // Leere XML-Struktur
        foreach ($fahrtenArray as $fahrt) {
            $fahrten = $xml->addChild('fahrten');
            $fahrten->addAttribute('id', (string) $fahrt['id']);
            $fahrten->addChild('name', (string) $fahrt->name);
            $fahrten->addChild('wohnort', (string) $fahrt->wohnort);
            $fahrten->addChild('zweck', (string) $fahrt->zweck);
            $fahrten->addChild('kmdiff', (string) $fahrt->kmdiff);
            $fahrten->addChild('datum', (string) $fahrt->datum);
            $fahrten->addChild('uhrzeit_von', (string) $fahrt->uhrzeit_von);
            $fahrten->addChild('uhrzeit_bis', (string) $fahrt->uhrzeit_bis);
            $fahrten->addChild('km_start', (string) $fahrt->km_start);
            $fahrten->addChild('km_end', (string) $fahrt->km_end);

        }

        // Speichere die geänderte XML-Datei
        $xml->asXML($xmlFile);

        $xml = simplexml_load_file('fahrtenbuch.xml');
        $num = 1;
        foreach ($xml->fahrten as $fahrt) {
            (int) $fahrt['id'] = $num;
            $num += 1;
            (string) $fahrt['id'];
        }
        $xml->asXML($xmlFile);

        // Seite neu laden, um den aktualisierten Stand anzuzeigen
        header("Location: ausgabe.php");
        exit;
    }
}
?>