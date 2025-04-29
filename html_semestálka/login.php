<?php
session_start();

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $email, $zakriptovane_heslo);
        $stmt->fetch();
        
        if (password_verify($password, $zakriptovane_heslo)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;
            header("Location: index.php"); // Presmerovanie na hlavnú stránku po prihlásení
            exit();
        } else {
            $message = "Nesprávne heslo.";
        }
    } else {
        $message = "Používateľ neexistuje.";
    }
    $stmt->close();
}

//Tu skontrolujeme, či je používateľ prihlásený.
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
                <h1>Prihlásenie</h1>
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

    <div class="formular" id="formular">
        <h2>Prihlásenie</h2>
        <form name="formular" action="login.php" method="post">
            <p>E-mail:</p>
            <input type="email" id="email" name="email"><br>
            <p>Heslo:</p>
            <input type="password" id="heslo" name="password"><br>
            <br>

            <p class="allert" style="color: red;"><?php echo $message; ?></p>
            <input type="submit" value="Prihlásiť">
            <input type="reset" value="Vymazať"><br>
          </form>
    </div>
 
<footer style="margin-top: 21.7%;">
    <p>Autor: Martin Mohelník</p>
    <p>Skupina: 3ZKA1Aa</p>
    <p>ID: 319283</p>
</footer>