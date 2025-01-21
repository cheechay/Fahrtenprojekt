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
    <title>Fahrtenbuch Korrektur</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
<header>
        <div class="main_container" >
            <svg xmlns="http://www.w3.org/2000/svg" width="100.638" height="80.727" viewBox="0 0 190.638 180.727">
                <g id="Gruppe_1" data-name="Gruppe 1" transform="translate(-347.638 -262.252)">
                  <g id="suA0yN01" transform="translate(286.645 509.206)">
                    <path id="Pfad_29" data-name="Pfad 29" d="M102.046-199.133c-4.8.9-8.355,2.41-11.14,4.745-2.881,2.41-1.441,2.485,3.361.3l3.553-1.657-.576,12.8A220.636,220.636,0,0,1,95.132-160.8c-1.537,8.736-7.395,32.986-8.739,35.7-.48.9,0,1.2,1.729,1.2,2.113,0,2.5-.452,3.457-4.368.576-2.335,2.209-8.359,3.457-13.33,2.5-9.489,5.378-23.8,7.875-39.388l1.537-9.339-2.5-2.711-2.5-2.786,3.553-.6a91.482,91.482,0,0,1,13.253-.377c8.067.226,10.276.527,13.829,2.109,6.05,2.636,8.067,5.121,8.547,10.468.384,4.368.288,4.519-2.5,5.648-3.745,1.506-7.875,5.422-8.547,8.134-.768,3.088-5.474,5.121-22.76,9.941-1.152.3-1.537.753-.96,1.2,1.056.828,12.869-1.13,18.054-3.088,4.8-1.807,4.9-1.807,5.186.452.48,5.046,5.954,9.414,19.975,15.815,13.445,6.251,12.869,5.422,8.355,11.071-2.113,2.636-4.994,6.477-6.338,8.585l-2.5,3.841,3.169,1.2a16.1,16.1,0,0,0,7.2.753c2.113-.226,3.937-.226,3.937,0,0,.3-2.017,1.431-4.514,2.561-4.033,1.807-5.57,2.109-12.484,2.109-9.219,0-11.428-.9-16.518-7-1.825-2.109-3.649-3.69-4.129-3.464-.864.452,1.441,5.2,3.937,7.832,6.626,7.079,26.89,7.079,36.3-.151,3.169-2.41,3.361-2.41,14.981-2.937,6.434-.3,16.71-.6,22.856-.6,9.507-.075,11.332-.226,11.812-1.356.864-1.732-.576-2.184-7.875-2.786-4.514-.377-6.434-.226-7.01.377-.48.678-5.282,1.13-14.981,1.431-7.779.226-14.309.377-14.5.3a9.992,9.992,0,0,1,.864-2.485c1.344-3.012.48-7.757-2.209-11.447l-2.017-2.862,11.812-13.782c6.53-7.606,16.806-19.2,22.856-25.832s11.236-12.652,11.524-13.405c.384-1.13-.288-1.28-4.706-1.28-11.812-.075-53.683,1.807-53.683,2.41,0,.3,1.152,1.054,2.689,1.657,2.3.9,4.9.9,18.439.075,8.739-.527,19.4-1.13,23.72-1.356,9.027-.452,8.931-.979,2.017,6.7-2.3,2.561-11.62,13.029-20.839,23.346s-16.9,18.9-17.094,19.129a3.045,3.045,0,0,1-2.017-.6c-.864-.452-4.9-2.259-8.835-3.991-11.332-4.971-15.942-7.908-18.15-11.447-2.881-4.594-2.593-6.251,1.537-9.037a21.625,21.625,0,0,0,5.282-5.5c1.921-3.54,3.073-4.067,8.739-4.067,6.338,0,10.948,1.356,14.5,4.217,3.553,2.937,5.282,2.335,3.265-.979-1.825-3.088-7.683-5.046-16.134-5.347l-7.2-.3v-4.293c0-6.853-5.282-11.673-15.461-14.083C122.694-200.037,107.9-200.188,102.046-199.133Zm62.518,63.562c1.441,2.41,1.537,8.284.192,10.242-.864,1.13-2.113,1.431-6.722,1.431h-5.57l4.9-6.778c2.785-3.69,5.282-6.778,5.57-6.778S163.988-136.626,164.564-135.571Z" transform="translate(0)" fill="#ff8a00"/>
                  </g>
                  <path id="Pfad_28" data-name="Pfad 28" d="M132.627-223.086c0,.571,1.589,1.943,3.476,3.2,3.973,2.4,4.171,2.857,1.688,4.572-1.391,1.029-2.582.8-5.959-1.486-2.284-1.6-4.171-3.657-4.171-4.571,0-1.029-.7-1.371-1.688-1.029-.993.229-4.569,1.371-7.946,2.514-3.476,1.029-6.257,2.171-6.257,2.514s1.688,2.171,3.675,4.229c3.178,3.2,3.576,4,2.384,5.486-1.093,1.6-1.788,1.486-6.059-1.829-2.582-1.943-4.569-4-4.37-4.457.3-.571.1-.914-.4-.914-1.39,0-15.1,11.429-15.1,12.571,0,.571,2.682,2.057,5.959,3.086,6.357,2.171,6.853,2.629,4.469,4.914-1.192,1.143-2.781.914-8.343-1.371L87.138-198.4l-4.569,6.514c-2.483,3.543-4.569,6.743-4.569,7.2,0,.343,9.932.686,22.149.686H122.3l4.37-5.257a86.543,86.543,0,0,1,11.819-10.857c4.171-3.2,6.555-5.6,5.463-5.6-3.675,0-12.415,5.714-17.679,11.429l-5.363,5.829-9.038-.229c-4.966-.114-9.038-.343-9.038-.686a18.867,18.867,0,0,1,1.589-3.314c1.986-3.429.795-7.771-2.483-9.029-2.682-.914-2.582-2.286.1-4.457,2.88-2.4,4.966-2.286,7.846.229,3.774,3.429,6.555,3.657,9.435,1.143,2.483-2.286,2.682-4.229.993-9.029-1.291-3.543,3.278-3.429,9.336.229,6.555,3.886,9.336,3.314,12.217-2.4,1.788-3.429,2.582-3.543,12.614-1.714,6.952,1.371,20.361,8,22.745,11.2.993,1.486.6,1.6-3.079.571-5.959-1.6-16.189-1.257-22.447.686-7.25,2.286-13.21,6.629-19.765,14.171-4.966,5.829-5.363,6.514-3.377,6.857,1.49.229,3.675-1.143,6.654-4.229,6.952-7.429,13.011-11.314,20.758-13.257,12.514-3.2,24.532.914,34.762,12.114l5.165,5.6,35.16-.114c22.347-.114,33.869-.457,31.683-1.143-1.887-.571-14-3.771-26.817-7.2-48.27-13.029-50.753-13.829-56.613-18.286C168.581-218.857,152.987-224,138.685-224,135.308-224,132.627-223.543,132.627-223.086Zm75.285,27.543c7.946,2.4,14.6,4.8,14.9,5.6.3,1.029-2.88,1.371-12.415,1.371l-12.713-.114-5.959-6.171-5.959-6.171,3.874.686C191.723-200,199.966-197.829,207.912-195.543Zm-114.12,5.029c.894,1.257.3,1.486-2.682,1.371-4.469-.343-4.469-.343-3.675-1.714C88.329-192.457,92.5-192.229,93.792-190.514Z"  fill="#3659b9"/>
                  <path id="Pfad_30" data-name="Pfad 30" d="M33-110.733c0,.57.94.912,2.09.912s14.1,3.079,28.941,6.842c25.493,6.614,26.955,7.07,30.926,11.061l4.179,4.105,1.985-2.623c1.463-1.939,2.507-2.395,4.6-1.824l2.716.8-2.09,3.763-2.09,3.763,4.7,2.509c5.328,2.851,6.582,2.281,8.776-3.649,1.672-4.789,1.463-4.561,3.866-2.965,2.09,1.482,2.09,1.6.313,6.842L120.03-75.84l4.493,1.254a33.7,33.7,0,0,0,7.1,1.254c2.507,0,2.716-.456,2.716-4.561,0-2.509.418-4.561.94-4.561,1.881,0,3.657,3.877,3.343,7.412l-.209,3.763,9.716-.456c12.955-.8,20.269-2.851,32.179-9.122,8.567-4.561,11.284-6.842,20.164-16.534,5.537-6.158,10.134-11.631,10.134-12.315s-1.463-1.254-3.239-1.254c-2.4,0-4.7,1.368-8.776,5.473a53.247,53.247,0,0,1-11.7,8.78c-5.433,2.965-7.209,3.307-16.508,3.307-9.821.114-10.866-.114-17.657-3.763a58.355,58.355,0,0,1-11.806-8.78c-2.612-2.851-5.537-5.017-6.791-5.017-1.985,0-1.776.684,2.3,5.131,14.836,16.534,30.4,21.21,49.1,14.824l2.612-.8-2.612,2.167c-7.731,6.728-23.508,12.771-34.478,13.113-5.433.228-6.791-.114-7.94-1.939-4.493-7.184-7.313-7.868-11.284-2.737-2.194,2.851-3.03,3.307-4.284,2.167-.94-.912-1.254-2.509-.836-4.561.418-2.509-.1-3.991-2.09-6.158-3.448-3.763-4.91-3.763-8.567.456-3.657,4.105-4.7,4.333-4.7.8a9.947,9.947,0,0,0-2.194-5.245c-1.881-2.167-3.03-2.509-6.582-2.053-3.448.57-5.015.114-8.045-2.167a36.354,36.354,0,0,0-10.343-4.561c-12.955-3.307-10.657-3.763,16.194-3.877h26.12l4.179,4.105c5.328,5.131,11.6,9.122,15.985,10.149,1.776.342,3.343.57,3.343.228,0-.228-2.821-2.395-6.164-4.675a68.786,68.786,0,0,1-10.761-9.236l-4.6-5.017-47.747-.342C54.523-111.417,33-111.189,33-110.733Z" transform="translate(314.638 514.258)" fill="#3659b9"/>
                </g>
              </svg>
        </div>
        <h2>Fahrtenbuch</h2>
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
                <legend><i class="fa-solid fa-pen"></i> bearbeiten</legend>

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


               <div class="btn_container">
                    <button class="abbrechen" type="submit" onclick="window.location.href='ausgabe.php';" style="margin-left:-10px;">Abbrechen 
                   <i class="fa-regular fa-circle-xmark"></i></button>

                                                <div >
                    <button type="submit" style="margin-left:50px;" onclick="return testEingabe()"> Abgeben <i class="fa-regular fa-circle-right"></i></button>

                </div>
                </div>



            </fieldset>
        </form>


    </div>
    
    <footer>
        <p>&copy; 2025 Created by Priyanka, Zhazmira, Shella Mae</p>
    </footer>

    <script>
       function testEingabe(){
            const kmStart = parseFloat(document.getElementById('km_start').value) || 0;
            const kmEnd = parseFloat(document.getElementById('km_end').value) || 0;
            const uhrzeit_von= parseFloat(document.getElementById('uhrzeit_von').value) || 0;
            const uhrzeit_bis= parseFloat(document.getElementById('uhrzeit_bis').value) || 0;


            
            if (uhrzeit_von >= uhrzeit_bis && kmStart >= kmEnd)
            {
               alert('Bitte, Eingaben überprüfen☹️ !!')
               return false;
            }  
            if(kmStart>=kmEnd){
             alert('Km End stimmt nicht☹️ !!')
              return false;
             }
            if(uhrzeit_von>= uhrzeit_bis)
               {
                 alert('Uhrzeit bis stimmt nicht☹️ !!')
                 return false;
               }

           }


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