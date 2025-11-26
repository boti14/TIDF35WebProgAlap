<!DOCTYPE html>

<html lang="hu">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Űrlap</title>
</head>
<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "<h2>Kapcsolatp</h2>";

        //Adat beolvasás
        $nev = htmlspecialchars(trim($_POST["nev"] ?? ""));
        $age = htmlspecialchars(trim($_POST["age"] ?? "Nincs megadva"));
        $email = htmlspecialchars(trim($_POST["email"] ?? ""));
        $phone = htmlspecialchars(trim($_POST["phone"] ?? "Nincs megadva"));

        //Validáció szerveroldalon
        $error = [];
        if (!preg_match("/^[A-ZÁÉÍÓÖŐÚÜŰa-záéíóöőúüű ]{4,}$/u", $nev)){$error[] = "A név formátuma hibás.";}
        if (!preg_match("/^[0-9]{11}$/", $phone)) {$error[] = "A telefonszám formátuma nem megfelelő. (06xx1234567)";}

        //Hiba megjelenítése vagy adatok kiírása
        if (count($error) > 0) {
            echo "<div class= 'error'><p><strong>Hiba történt:</strong></p><ul>";
            foreach ($error as $errora) {
                echo "<li>$hiba</li>";
            }
            echo "</ul></div>";

        } else {

            //Adatok táblázatos megjelenítése
            echo "<table>";
                echo "<tr><td>Név:</td><td>$nev</td></tr>";
                echo "<tr><td>Életkor:</td><td>$age</td></tr>";
                echo "<tr><td>Email cím:</td><td>$email</td></tr>";
                echo "<tr><td>Telefonszám:</td><td>$phone</td></tr>";
                
            echo "</table>";

            //fájl mentése

            $sor = date("Y-m-d H:i:s") . " | " .
                    "Név: $nev | " .
                    "PIN: $pin | " .
                    "Kedvenc gyümölcs: $fav_fruit | " .
                    "Életkor: $age | " .
                    "Lábméret: $feet_size | " .
                    "Önbizalom: $confidence" . PHP_EOL;

            $fajl = "tidf35_adatok.txt";

            if (file_put_contents($fajl, $sor, FILE_APPEND | LOCK_EX)) {
                echo "<p class='success'>✅Az adatok sikeresen elmentve a <strong> $fajl </strong> fájlba.</p>";
            } else {
                echo "<p class='error'>🔺 Hiba történt az adatok mentésekor!</p>";
            }

        }    
    } else{
        echo "<p class='error'>Nem POST metódussal érkezett az űrlap!</p>";
    }

    ?>

        <a href="tidf35_urlap.html"><strong>Vissza az űrlapra</strong></a>
</body>
</html>