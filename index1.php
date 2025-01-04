<?php
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

    $kmdiff = (int) $km_end - (int) $km_start;

}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fahrtenbuch Korrektur</title>
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

        <div style="display: flex; align-items: center; text-align: center; padding:20px;">
            <i class="fa-regular fa-pen-to-square" style="font-size: 24px; margin-right: 10px;"></i>
            <hr style="flex: 1; border: 0.5px solid #000; margin: 0 10px;">
            <i class="fa-regular fa-circle-question" style="font-size: 24px; margin-right: 10px;"></i>
            <hr style="flex: 1; border: 0.1px solid #000; margin: 0 10px;">
            <i class="fa-solid fa-pen fa-beat-fade" style="font-size: 24px; margin-left: 10px;"></i>
            <hr style="flex: 1; border: 0.1px solid #000; margin: 0 10px;">
            <i class="fa-regular fa-circle-check" style="font-size: 24px; margin-right: 10px;"></i>

        </div>

        <form action="index.php" method="post">

            <!--<h3>Personal Information</h3> -->
            <fieldset>
                <legend>Personal Information</legend>

                <table class="info-section">
                    <tr>
                        <td><label for="name"> Name</label></td>
                        <td colspan="2"><input type="text" name="name" id="name" size="35"
                                value="<?php echo htmlspecialchars($name); ?> " required></td>
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
            <button type="submit" onclick="window.location.href='index.html';" style="position: relative;
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