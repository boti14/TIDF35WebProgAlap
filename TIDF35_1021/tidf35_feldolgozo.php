<!DOCTYPE html>

<html lang="hu">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Feldolgozó</title>

</head>

<body>
    <?php

    if (isset($_POST))
    {

        echo "<h2>HTML űrlap</h2>";

        $nev = $_POST['nev'];
        $pin = $_POST['pin'];
        $fav_fruit = $_POST['fav_fruit'];
        $age = $_POST['age'];
        $feet_size = $_POST['feet_size'];
        $confidence = $_POST['confidence'];

        echo "<p><stong>Név:</stong> " . $nev . "</p>";
        echo "<p><stong>PIN kód:</stong> " . $pin . "</p>";
        echo "<p><strong>Kedvenc gyümölcs:<strong> " . $fav_fruit . "</p>";
        echo "<p><strong>Életkor:</strong> " . $age . "</p>";
        echo "<p><strong>Lábméret:</strong> " . $feet_size .
"</p>";
        echo "<p><strong>Őnbizalom:</strong> " . $confidence . "</p>";

    }   
     else{
            echo "<h2><strong>Űrlap nem lett beküldve!</strong></h2>";
        }

    ?>

    <a href="tidf35_urlap.html"><strong>Vissza az űrlapra</strong></a>
    
</body>

</html>