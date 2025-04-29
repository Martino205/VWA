<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TicketSystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Chyba pripojenia: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_email = $conn->real_escape_string($_POST['new_email']);
    $old_password = $conn->real_escape_string($_POST['old_password']);
    $new_password = $conn->real_escape_string($_POST['new_password']);

    $user_id = $_SESSION['user_id'];

    // Načítame aktuálne heslo
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($old_password, $hashed_password)) {
        // Aktualizujeme email a heslo ak je nové heslo zadané
        if (!empty($new_password)) {
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $conn->prepare("UPDATE users SET email = ?, password = ? WHERE id = ?");
            $update_stmt->bind_param("ssi", $new_email, $new_hashed_password, $user_id);
        } else {
            // Ak nechce meniť heslo
            $update_stmt = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
            $update_stmt->bind_param("si", $new_email, $user_id);
        }

        if ($update_stmt->execute()) {
            $message = "Údaje boli úspešne zmenené.";
            $_SESSION['email'] = $new_email;
        } else {
            $message = "Chyba pri zmene údajov.";
        }
        $update_stmt->close();
    } else {
        $message = "Staré heslo je nesprávne.";
    }
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
                    
                    ?>
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

    <div class="formular">
        <h2>Zmeniť údaje</h2>
        <form method="post" action="">
            <p>Nový e-mail:</p>
            <input type="email" name="new_email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required><br>

            <p>Staré heslo (pre potvrdenie):</p>
            <input type="password" name="old_password" required><br>

            <p>Nové heslo (ak chcete zmeniť):</p>
            <input type="password" name="new_password"><br><br>

            <p style="color: red;"><?php echo $message; ?></p>

            <input type="submit" value="Uložiť zmeny">
        </form>
    </div>

<footer style="margin-top: 21.7%;">
    <p>Autor: Martin Mohelník</p>
    <p>Skupina: 3ZKA1Aa</p>
    <p>ID: 319283</p>
</footer>