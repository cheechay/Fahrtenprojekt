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
                <li><a href="">List</a></li>

            </ul>
        </nav>
    </header>


    <div class="container">

        <div style="display: flex; align-items: center; text-align: center;padding:20px;">
            <i class="fa-regular fa-pen-to-square" style="font-size: 24px; margin-right: 10px;"></i>
            <hr style="flex: 1; border: 0.5px solid #000; margin: 0 10px;">
            <i class="fa-regular fa-circle-question fa-beat-fade" style="font-size: 24px; margin-right: 10px;"></i>
            <hr style="flex: 1; border: 0.1px solid #000; margin: 0 10px;">
            <i class="fa-solid fa-pen" style="font-size: 24px; margin-right: 10px;"></i>
            <hr style="flex: 1; border: 0.1px solid #000; margin: 0 10px;">
            <i class="fa-regular fa-circle-check" style="font-size: 24px; margin-right: 10px;"></i>
        </div>
        <h4>Bitte die Eingaben überprüfen</h4>
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
                <td style="flex:left;">
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
                        <button type="submit" id="edit">Formular Bearbeiten <i
                                class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td>
                <td style="flex:right;">
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
                        <button type="submit" id="next">Speichern <i class="fa-solid fa-floppy-disk"></i></button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <footer>
        <p>&copy;</p>
    </footer>

    </div>

</body>

</html>


​‌‌‍⁡⁣⁣⁢