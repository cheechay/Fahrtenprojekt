<?php
// Überprüfen, ob die ID über die URL übergeben wurde
if (isset($_GET['id'])) {
    $id = $_GET['id']; // ID aus der URL holen

    // XML-Datei laden
    $xmlFile = 'fahrtenbuch.xml';
    $xml = simplexml_load_file($xmlFile) or die("Error: Cannot create object");

    //prüfen ob die ID die höchste ist
    $ids = [];
    foreach ($xml->fahrten as $fahrt) {
        $ids[] = (string) $fahrt['id'];
    }
    $maxId = max($ids);

    // Suche die Fahrt mit der entsprechenden ID
    foreach ($xml->fahrten as $fahrt) {
        if ((string) $fahrt['id'] === $id) {
            $id = (string) $fahrt['id'];
            $name = $fahrt->name;
            $wohnort = $fahrt->wohnort;
            $zweck = $fahrt->zweck;
            $datum = $fahrt->datum;
            $km_start = $fahrt->km_start;
            //$km_end = $fahrt->Km_end;
            //$kmdiff = $fahrt->Kmdiff;
            $km_end = isset($fahrt->km_end) ? $fahrt->km_end : 'N/A'; // Default-Wert, falls kein Wert vorhanden
            $kmdiff = isset($fahrt->kmdiff) ? $fahrt->kmdiff : 'N/A'; // Default-Wert, falls kein Wert vorhanden

        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Liste</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Details für Fahrt-ID:<?php echo htmlspecialchars($id); ?></h1>
    <p>Name: <?php echo htmlspecialchars($name); ?></p>
    <p>
        Wohnort: <?php echo htmlspecialchars($wohnort); ?>
    </p>
    <p>Zweck: <?php echo htmlspecialchars($zweck); ?></p>
    <p>Datum: <?php echo htmlspecialchars($datum); ?></p>
    <p>Km Start: <?php echo htmlspecialchars($km_start); ?></p>
    <p>Km Ende: <?php echo htmlspecialchars($km_end); ?></p>
    <p>Km Diff: <?php echo htmlspecialchars($kmdiff); ?></p>
    <?php if ($id == $maxId): ?>
        <form action="editDetailFile.php" method="post">
            <input type="hidden" name="form_type" value="form2">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($fahrt['id']); ?>">
            <input type="hidden" name="datum" value="<?php echo htmlspecialchars($datum); ?>">
            <input type="hidden" name="uhrzeit_von" value="<?php echo htmlspecialchars($uhrzeit_von); ?>">
            <input type="hidden" name="uhrzeit_bis" value="<?php echo htmlspecialchars($uhrzeit_bis); ?>">
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <input type="hidden" name="wohnort" value="<?php echo htmlspecialchars($wohnort); ?>">
            <input type="hidden" name="zweck" value="<?php echo htmlspecialchars($zweck); ?>">
            <input type="hidden" name="km_start" value="<?php echo htmlspecialchars($km_start); ?>">
            <input type="hidden" name="km_end" value="<?php echo htmlspecialchars($km_end); ?>">

            <button type="submit" style="display:block; margin:auto;">Bearbeiten</button>
        </form>
    <?php else: ?>
        <button style="display:block; margin:auto;" disabled>Bearbeiten</button>
    <?php endif; ?>





</body>

</html>