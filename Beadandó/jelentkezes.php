<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "<h2>Jelentkezés a kórusba</h2>">

        $nev = htmlspecialchars(trim($_POST["nev"] ?? ""));
        $eletkor = htmlspecialchars(trim($_POST["eletkor"] ?? ""));
        $hely = htmlspecialchars(trim($_POST["hely"] ?? ""));
        $szolam = htmlspecialchars(trim($_POST["szolam"] ?? ""));
        $email = htmlspecialchars(trim($_POST["email"] ?? ""));
        $telefon = htmlspecialchars(trim($_POST["telefon"] ?? ""));

        $hibak = [];
        if (!preg_match("/^[A-ZÁÉÍÓÖŐÚÜŰa-záéíóöőúüű\s]+$/u", $nev)){$hibak[] = "Hibás a név formátum! Kérlek próbáld meg újra.";}
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){$hibak[] = "Hibás az email formátuma! Kérlek próbáld meg újra.";}
        if (preg_match("/^(\+|06|0036)[0-9\s]{8,}$/", $telefon)){$hibak[] = "Hibás a telefonszám formátuma! Kérlek próbáld meg újra.";}

        if  (count($hibak) > 0)
        {
            echo "<div class= 'error'><p><strong>Hiba történt:</strong></p><ul>";
            foreach ($hibak as $hiba) {
                echo "<li>$hiba</li>";
            }
            echo "</ul></div>";
        }
        else
        {
            echo "<table>";
                echo "<tr><td>Név:</td><td>$nev</td></tr>";
                echo "<tr><td>Életkor:</td><td>$eletkor</td></tr>";
                echo "<tr><td>Helység:</td><td>$hely</td></tr>";
                echo "<tr><td>Szólam:</td><td>$szolam</td></tr>";
                echo "<tr><td>Email cím:</td><td>$email</td></tr>";
                echo "<tr><td>Telefonszám:</td><td>$telefon</td></tr>";

            echo "</table>";
        
            $sor = date("Y-m-d H:i:s") . " | " .
                    "Név: $nev | " .
                    "Életkor: $eletkor | " .
                    "Helység: $hely | " .
                    "Szólam: $szolam | " .
                    "Email cím: $email | " .
                    "Telefonszám: $telefon" . PHP_EOL;

            $fajl = "jelentkezok.txt";

            if (file_put_contents($fajl, $sor, FILE_APPEND | LOCK_EX)) {
                echo "<p class='success'>✅Az adatokat sikeresen rögzítettük a <strong> $fajl </strong> fájlba.</p>";
            } else {
                echo "<p class='error'>🔺 Hiba történt az adatok ögzítésekor!</p>";
            }
        }
    }
    ?>
    
    
</body>
</html>

