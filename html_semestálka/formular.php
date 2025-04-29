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
    else if(empty($_POST["text"])) {
        $message = "Poznamka je povinna.";
    }
    else {
        $name = $conn->real_escape_string($_POST["name"]);
        $lastname = $conn->real_escape_string($_POST["lastname"]);
        $email = $conn->real_escape_string($_POST["email"]);
        $pozition = $conn->real_escape_string($_POST["pozition"]);
        $classOfStudent = $conn->real_escape_string($_POST["classOfStudent"]);
        $text = $conn->real_escape_string($_POST["text"]);

        // SQL dotaz na vloženie údajov
        $sql = "INSERT INTO reviews (name, lastname, email, pozition, classOfStudent, text) 
                VALUES ('$name', '$lastname', '$email', '$pozition', '$classOfStudent', '$text')";

        if ($conn->query($sql) === TRUE) {
            echo "Recenzia bola úspešne uložená!";
        } else {
            echo "Chyba pri ukladaní: " . $conn->error;
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
                <h1>Napíš mi recenziu</h1>
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
        <h1><a href="#formular">RECENZIA</a></h1>
    </div>

    <div class="formular" id="formular">
        <h2>Napíš mi recenziu</h2>
        <form id="formular_java" name="formular" action="formular.php" method="post">
            <p>Meno:</p>
            <input type="text" id="meno" name="name"><br>
            <p>Priezvisko:</p>
            <input type="text" id="priezvisko" name="lastname"><br>
            <p>E-mail:</p>
            <input type="email" id="email" name="email"><br>
            <p>Pozícia:</p>
            <div class="pozicia">
                <input type="radio" name="pozition" value="student">Študent
                <input type="radio" name="pozition" value="ucitel">Učiteľ
                <input type="radio" name="pozition" value="ine">Iné
            </div>
            <div class="rocnik">
                <label for="rocnik"><p>Ročník:</p></label>
                <select name="classOfStudent" id="rocnik">
                    <option value="none">Žiadny</option>
                    <option value="prvy">Prvý</option>
                    <option value="druhy">Druhý</option>
                    <option value="treti">Tretí</option>
                    <option value="stvrty">Štvrtý</option>
                    <option value="piaty">Piaty</option>
                    <option value="iny">Iný</option>
                </select>
            </div>
            <p>Poznamka:</p>
            <textarea name="text" id="poznamka" cols="40" rows="10"></textarea><br>
            <p class="allert" style="color: red;"><?php echo $message; ?></p>
            <input type="submit" value="Odoslať">
            <input type="reset" value="Vymazať"><br>
          </form>
    </div>

    <br>

    <div class="vypis-recenzii">
        <h2>Recenzie od používateľov</h2>

        <?php
        // Načítanie recenzií z databázy
        $sql = "SELECT name, lastname, pozition, classOfStudent, text FROM reviews ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Výpis každej recenzie
            while($row = $result->fetch_assoc()) {
                echo "<div class='recenzia'>";
                echo "<h3>" . htmlspecialchars($row["name"]) . " " . htmlspecialchars($row["lastname"]) . "</h3>";
                echo "<p><strong>Pozícia:</strong> " . htmlspecialchars($row["pozition"]) . "</p>";
                if ($row["pozition"] === "student") {
                    echo "<p><strong>Ročník:</strong> " . htmlspecialchars($row["classOfStudent"]) . "</p>";
                }
                echo "<p><strong>Recenzia:</strong><br>" . nl2br(htmlspecialchars($row["text"])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Zatiaľ neexistujú žiadne recenzie.</p>";
        }

        // Uzavretie spojenia
        $conn->close();
        ?>
</div>
 
<footer>
    <p>Autor: Martin Mohelník</p>
    <p>Skupina: 3ZKA1Aa</p>
    <p>ID: 319283</p>
</footer>
      

<!-- <script>
        document.getElementById('formular_java').addEventListener('submit', function(event) {
          event.preventDefault(); // zabráni odoslanie formulára
    
          var meno = document.getElementById('meno').value;
          var priezvisko = document.getElementById('priezvisko').value;
          var email = document.getElementById('email').value;
          var poznamka = document.getElementById('poznamka').value;

          let emailValidator = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
          let menoValidator = /^[a-zA-ZàáâäãåąčćďęèéêëėįìíîïłĺľńòóôöõøŕřťùúûüųūÿýżźñňçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČĎŇŠŤŽ∂ð ,.'-]+$/u;

          if(emailValidator.test(email)) {
              console.log("Email valid");
              document.getElementById('email').classList.remove('invalid');
          }
          else {
              console.log("Email invalid");
              document.getElementById('email').classList.add('invalid');
          }
          if(menoValidator.test(meno)) {
              console.log("meno valid");
              document.getElementById('meno').classList.remove('invalid');
          }
          else {
              console.log("meno invalid");
              document.getElementById('meno').classList.add('invalid');
          }
          if(menoValidator.test(priezvisko)) {
              console.log("priezvisko valid");
              document.getElementById('priezvisko').classList.remove('invalid');
          }
          else {
              console.log("priezvisko invalid");
              document.getElementById('priezvisko').classList.add('invalid');
          }
          if(menoValidator.test(poznamka)) {
              console.log("poznamka valid");
              document.getElementById('poznamka').classList.remove('invalid');
          }
          else {
              console.log("poznamka invalid");
              document.getElementById('poznamka').classList.add('invalid');
          }
        });
      </script>

        <script>
            document.querySelector('form').addEventListener('submit', function(event) {
            
            event.preventDefault();

            var invalid_element = document.querySelectorAll('.invalid');

            if(invalid_element.length){ //podmienka na to aby neotvorilo novu stranku s vypísanými udajmi, ked niesu vyplnene vsetky udaje
                console.log('invalid elements');
            }
            else {
                var meno = document.getElementById('meno').value;
                var priezvisko = document.getElementById('priezvisko').value;
                var email = document.getElementById('email').value;
                var poznamka = document.getElementById('poznamka').value;


                var newWindow = window.open("", "_blank");
                newWindow.document.write("<h1>Meno: " + meno + "</h4>");
                newWindow.document.write("<h1>Priezvisko: " + priezvisko + "</h4>");
                newWindow.document.write("<h1>Email: " + email + "</h4>");
                newWindow.document.write("<h1>Poznamka: " + poznamka + "</h4>");
            }
            
            });
        </script> -->

</body>
</html>