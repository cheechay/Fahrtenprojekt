<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Liste</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

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
                $uhrzeit_von = isset($fahrt->uhrzeit_von) ? $fahrt->uhrzeit_von : 'Nicht eingegeben';
                $uhrzeit_bis = isset($fahrt->uhrzeit_bis) ? $fahrt->uhrzeit_bis : 'Nicht eingegeben';
                $km_start = $fahrt->km_start ? $fahrt->km_start : 'Nicht eingegeben';
                ;
                $km_end = isset($fahrt->km_end) ? $fahrt->km_end : 'Nicht eingegeben'; // Default-Wert, falls kein Wert vorhanden
                $kmdiff = isset($fahrt->kmdiff) ? $fahrt->kmdiff : ''; // Default-Wert, falls kein Wert vorhanden
            }
        }
    }
    ?>
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
        <fieldset>
            <h1 style=" color:black; padding:20px; text-align:center;">Details </h1>
            <table>
                <tr style="margin-top:40px;">
                    <th>Name:</th>
                    <td><?php echo htmlspecialchars($name); ?></td>
                </tr>
                <tr>
                    <th>Wohnort:</th>
                    <td><?php echo htmlspecialchars($wohnort); ?></td>
                </tr>
                <tr>
                    <th>Zweck:</th>
                    <td><?php echo htmlspecialchars($zweck); ?></td>
                </tr>
                <tr>
                    <th>Datum:</th>
                    <td><?php echo htmlspecialchars($datum); ?></td>
                </tr>
                <tr>
                    <th>Uhrzeit von:</th>
                    <td><?php echo htmlspecialchars($uhrzeit_von); ?></td>
                </tr>
                <tr>
                    <th>Uhrzeit bis:</th>
                    <td><?php echo htmlspecialchars($uhrzeit_bis); ?></td>
                </tr>
                <tr>
                    <th>Km Start:</th>
                    <td><?php echo htmlspecialchars($km_start); ?></td>
                </tr>
                <tr>
                    <th>Km Ende:</th>
                    <td><?php echo htmlspecialchars($km_end); ?></td>
                </tr>
                <tr>
                    <th>Km Diff:</th>
                    <td><?php echo htmlspecialchars($kmdiff); ?></td>
                </tr>
            </table>
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
                    <button type="submit" style="display:block; margin:auto; margin-left:120px;">Bearbeiten <i
                            class="fa-solid fa-pen"></i></button>
                </form>
                <form action="ausgabe.php" method="get">

                    <button style="display:block; margin:auto; margin-left:120px;">Schließen <i
                            class="fa-regular fa-circle-xmark"></i></button>
                </form>

            <?php else: ?>
                <form action="ausgabe.php" method="get">

                    <button style="display:block; margin:auto;">Schließen <i
                            class="fa-regular fa-circle-xmark"></i></button>
                </form>
            <?php endif; ?>


        </fieldset>

    </div>
    <footer>
        <p>&copy;</p>
    </footer>
</body>

</html>