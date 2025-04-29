<?php

$servername = "localhost";
$username = "root";  // Zmeňte podľa potreby
$password = "";  // Zmeňte podľa potreby
$dbname = "TicketSystem";

// Vytvorenie spojenia s databázou
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola spojenia
if ($conn->connect_error) {
    die("Chyba pripojenia: " . $conn->connect_error);
}

$message = "";
// Spracovanie formulára
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $message = "Meno je povinne.";
    }
    else if(empty($_POST["lastname"])) {
        $message = "Priezvisko je povinne.";
    }
    else if(empty($_POST["email"])) {
        $message = "Email je povinny.";
    }
    else if(empty($_POST["password"])) {
        $message = "Heslo je povinne.";
    }
    else if(empty($_POST["adress"])) {
        $message = "Adresa je povinna.";
    }
    else if($_POST["password"] != $_POST["password2"]) {
        $message = "Heslo sa nezhoduje.";
    }
    else {
        $name = $conn->real_escape_string($_POST["name"]);
        $lastname = $conn->real_escape_string($_POST["lastname"]);
        $email = $conn->real_escape_string($_POST["email"]);
        $adress = $conn->real_escape_string($_POST["adress"]);
        $password = $conn->real_escape_string($_POST["password"]);


        // SQL dotaz na vloženie údajov
        $zakriptovane_heslo = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (name, lastname, email, adress, password) 
                VALUES ('$name', '$lastname', '$email', '$adress', '$zakriptovane_heslo')";

        if ($conn->query($sql) === TRUE) {
            $message = "Údaje boli úspešne uložené.";
        } else {
            $message = "Chyba pri uložení údajov: " . $conn->error;
        }
    }
}

//Tu skontrolujeme, či je používateľ prihlásený.
session_start();
$user = "";
if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kde na Slovensku</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/navigation-set/128/Where-1024.png"> <!-- obrazok hore -->
</head>

<body>
    <div>
        <header>
            <div class="lavy">
                <ul>
                    <li> <i class="fa fa-envelope"></i> <a class="mail" href="mailto:mohelnik@stud.uniza.sk">mohelnik@stud.uniza.sk</a></li>
                    <li> <i class="fa fa-phone-alt"></i> <a class="telc" href="tel:+42191789568">+421917789568</a> </li>
                    <li> <i class="fa-brands fa-instagram"></i> <a class="ing" href="https://instagram.com/martino_205?igshid=MWZjMTM2ODFkZg==" target="_blank">Instagram</a></li>
                </ul>
            </div>

            <div class="pravy">
                <ul>
                    <?php if(!empty($user)) { ?>
                        <li><a href="logout.php">Odhlásiť sa</a></li>
                        <li><a href="zmena_udajov.php">Zmeniť údaje</a></li>
                    <?php } 
                    else { ?>
                        <li><a href="login.php">Prihlásenie</a></li>
                        <li><a href="signup.php">Registrácia</a></li>
                    <?php } ?>
                </ul>
            </div>
        </header>
    </div>

    <div class="Hlmenu">
        <nav class="menu">
            <div class="nadpis">
                <h1>Registrácia</h1>
            </div>

            <div class="pravemenu">
                <ul>
                    <li><a href="index.php">Domov</a></li>
                    <li><a href="hrady.php">Hrady</a></li>
                    <li><a href="zamky.php">Zámky</a></li>
                    <li><a href="jaskyne.php">Jaskyne</a></li>
                    <li><a href="narodneparky.php">Národné parky</a></li>
                    <li><a href="formular.php">Recenzie</a></li>
                    <li><a href="objednavky.php">Objednávky</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="formularlogo">
        <h1><a href="#formular">REGISTRÁCIA</a></h1>
    </div>

    <div class="formular" id="formular">
        <h2>Registrácia</h2>
        <form name="formular" action="signup.php" method="post">
            <p>Meno:</p>
            <input type="text" id="meno" name="name"><br>
            <p>Priezvisko:</p>
            <input type="text" id="priezvisko" name="lastname"><br>
            <p>E-mail:</p>
            <input type="email" id="email" name="email"><br>
            <p>Adresa:</p>
            <input type="adress" id="adress" name="adress"><br>
            <p>Heslo:</p>
            <input type="password" id="heslo" name="password"><br>
            <p>Potvrdenie hesla:</p>
            <input type="password" id="heslo2" name="password2"><br>
            <br>

            <p class="allert" style="color: red;"><?php echo $message; ?></p>
            <input type="submit" value="Registrovať">
            <input type="reset" value="Vymazať"><br>
          </form>
    </div>
 
<footer>
    <p>Autor: Martin Mohelník</p>
    <p>Skupina: 3ZKA1Aa</p>
    <p>ID: 319283</p>
</footer>