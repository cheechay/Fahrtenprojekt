<?php

//testen ob Method als POST ist..
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datum = $_POST['datum'];
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

}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>Eingabe Kontrolle</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <div class="container">
        <h1>Fahrtenbuch - Project</h1>
        <h4>Bitte die Eingaben einmal überprüfen</h4>
        <table style="padding-left:20px;">
            <tr>
                <th style="text-align:left;">Name:</th>
                <td><?php echo htmlspecialchars($name); ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Wohnort:</th>
                <td><?php echo htmlspecialchars($wohnort); ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Zweck:</th>
                <td><?php echo htmlspecialchars($zweck); ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Datum:</th>
                <td><?php echo htmlspecialchars($datum); ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Uhrzeit von:</th>
                <td><?php echo htmlspecialchars($uhrzeit_von); ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Uhrzeit bis:</th>
                <td><?php echo htmlspecialchars($uhrzeit_bis); ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Km Start:</th>
                <td><?php echo htmlspecialchars($km_start); ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Km End:</th>
                <td><?php echo htmlspecialchars($km_end); ?></td>
            </tr>
            <tr>
                <th style="text-align:left;">Km Diff:</th>
                <td><?php echo htmlspecialchars($kmdiff); ?></td>
            </tr>
            <tr>
                <td><label for="edit">Bearbeiten</label></td>
                <td>
                    <!-- Form to redirect with current data as query parameters -->
                    <form action="index1.php" method="post">
                        <input type="hidden" name="form_type" value="form1">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
                        <input type="hidden" name="wohnort" value="<?php echo htmlspecialchars($wohnort); ?>">
                        <input type="hidden" name="zweck" value="<?php echo htmlspecialchars($zweck); ?>">
                        <input type="hidden" name="datum" value="<?php echo htmlspecialchars($datum); ?>">
                        <input type="hidden" name="uhrzeit_von" value="<?php echo htmlspecialchars($uhrzeit_von); ?>">
                        <input type="hidden" name="uhrzeit_bis" value="<?php echo htmlspecialchars($uhrzeit_bis); ?>">
                        <input type="hidden" name="km_start" value="<?php echo htmlspecialchars($km_start); ?>">
                        <input type="hidden" name="km_end" value="<?php echo htmlspecialchars($km_end); ?>">
                        <button type="submit" id="edit">Formular Bearbeiten</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td><label for="next">Weiter</label></td>
                <td>
                    <!-- Form to save data -->
                    <form action="saveFile.php" method="post">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
                        <input type="hidden" name="wohnort" value="<?php echo htmlspecialchars($wohnort); ?>">
                        <input type="hidden" name="zweck" value="<?php echo htmlspecialchars($zweck); ?>">
                        <input type="hidden" name="datum" value="<?php echo htmlspecialchars($datum); ?>">
                        <input type="hidden" name="uhrzeit_von" value="<?php echo htmlspecialchars($uhrzeit_von); ?>">
                        <input type="hidden" name="uhrzeit_bis" value="<?php echo htmlspecialchars($uhrzeit_bis); ?>">
                        <input type="hidden" name="km_start" value="<?php echo htmlspecialchars($km_start); ?>">
                        <input type="hidden" name="km_end" value="<?php echo htmlspecialchars($km_end); ?>">
                        <button type="submit" id="next">Speichern</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    </div>
</body>

</html>


​‌‌‍⁡⁣⁣⁢