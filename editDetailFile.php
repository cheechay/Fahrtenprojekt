<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $xmlFile = 'fahrtenbuch.xml';
    $xml = simplexml_load_file($xmlFile);

    // Identify the last entry
    $totalEntries = count($xml->fahrten);
    $lastEntry = $xml->fahrten[$totalEntries - 1];

    $name = $lastEntry->name;
    $datum = $lastEntry->datum;
    $wohnort = $lastEntry->wohnort;
    $zweck = $lastEntry->zweck;
    $km_start = $lastEntry->km_start;
    $km_end = $lastEntry->km_end;
    $kmdiff = $lastEntry->kmdiff;
    $uhrzeit_von = $lastEntry->uhrzeit_von;
    $uhrzeit_bis = $lastEntry->uhrzeit_bis;
    $kmdiff = $km_end - $km_start;


}

?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letzte Eingabe Korrektur</title>
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

        <form action="newSaveFile.php" method="post">

            <!--<h3>Personal Information</h3> -->
            <fieldset>
                <legend><i class="fa-solid fa-pen"></i> Bearbeiten</legend>

                <table class="info-section">
                    <tr>
                        <td><label for="name"> Name</label></td>
                        <td colspan="2"><input type="text" name="name" id="name" size="35"
                                value="<?php echo (string) $lastEntry->name; ?> " required></td>
                        <td rowspan="3">
                            <img src="map.png" alt="bwm" width="100" height="115">
                            <p><a href="https://www.google.com/maps/" target="_blank">Suchen auf Google map </a></p>
                        </td>

                    </tr>
                    <tr>
                        <td><label for="wohnort">Adresse</label></td>
                        <td colspan="2"><input type="text" name="wohnort" id="wohnort" size="35"
                                value="<?php echo htmlspecialchars($wohnort); ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="zweck">Zweck </label></td>
                        <td colspan="2"><input type="text" name="zweck" id="zweck" size="35" placeholder="Enter purpose"
                                value="<?php echo htmlspecialchars($zweck); ?>" required></td>
                    </tr>

                    <tr>
                        <td><label for="datum">Datum </label></td>
                        <td><input type="date" name="datum" id="datum" value="<?php echo htmlspecialchars($datum); ?>"
                                required></td>


                        <td><label for="km_start">Km Start</label></td>
                        <td><input type="number" name="km_start" id="km_start" min="0"
                                value="<?php echo htmlspecialchars($km_start); ?>" required></td>
                    </tr>
                    <tr>

                        <td> <label for="uhrzeit_von">Uhrzeit von</label></td>
                        <td> <input type="time" name="uhrzeit_von" id="uhrzeit_von"
                                value="<?php echo htmlspecialchars($uhrzeit_von); ?>" required></td>

                        <td><label for="km_end">Km End</label></td>
                        <td> <input type="number" name="km_end" id="km_end"
                                value="<?php echo htmlspecialchars($km_end); ?>" required></td>

                    </tr>
                    <tr>
                        <td> <label for="uhrzeit_bis">Uhrzeit bis</label></td>
                        <td><input type="time" name="uhrzeit_bis" id="uhrzeit_bis"
                                value="<?php echo htmlspecialchars($uhrzeit_bis); ?>" required> </td>

                        <td><label for="kmdiff">Km Diff</label></td>
                        <td><input type="text" name="kmdiff" id="kmdiff" size="35"
                                value="<?php echo htmlspecialchars($kmdiff); ?>" disabled></td>

                    </tr>
                </table>


                <div class="btn1">
                    <button type="submit" class="btn1" style="position:relative;
                    margin-left:-270px;"> Abgeben <i class="fa-regular fa-circle-right"></i></button>
                </div>


            </fieldset>
        </form>
        <div class="abbrechen">
            <button type="submit" onclick="window.location.href='ausgabe.php';" style="position: relative;
      top: 0.5px;
      left:21px;"> Abbrechen <i class="fa-regular fa-circle-xmark"></i></button>
        </div>

    </div>
    <footer>
        <p>&copy;</p>
    </footer>

    <script>


        function calculatekmdiff() {
            const kmStart = parseFloat(document.getElementById('km_start').value) || 0;
            const kmEnd = parseFloat(document.getElementById('km_end').value) || 0;

            const kmDiff = kmEnd >= kmStart ? kmEnd - kmStart : "";
            document.getElementById('kmdiff').value = kmDiff;

        }

        window.onload = function () {
            document.getElementById('km_start').addEventListener('input', calculatekmdiff);
            document.getElementById('km_end').addEventListener('input', calculatekmdiff);
            document.getElementById('kmdiff').value = "<?php echo htmlspecialchars($kmdiff); ?>";

        };

    </script>
</body>

</html>