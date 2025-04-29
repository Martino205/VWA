<?php
session_start();

//Tu skontrolujeme, či je používateľ prihlásený.
$user = "";
if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['email'];

    //priradenie user_id do premennej
    $user_id = $_SESSION['user_id']; 
}

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
//Spracovanie objednavky
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["atrakcia"])) {
        $message = "Atrakcia je povinná.";
    }
    else if(empty($_POST["miesto"])) {
        $message = "Miesto je povinne.";
    }
    else if(empty($_POST["datum"])) {
        $message = "Dátum je povinny.";
    }
    else if(empty($_POST["pocet"])) {
        $message = "Poznamka je povinna.";
    }
    else {
        $attraction_id = $conn->real_escape_string($_POST["miesto"]);
        $dateOfAttraction = $conn->real_escape_string($_POST["datum"]);
        $numberOfTickets = $conn->real_escape_string($_POST["pocet"]);
        $totalCost = $conn->real_escape_string($_POST["totalPrice"]);

        // SQL dotaz na vloženie údajov
        $sql = "INSERT INTO orders (user_id, attraction_id, totalCost, dateOfAttraction, numberOfTickets) 
                VALUES ('$user_id','$attraction_id','$totalCost', '$dateOfAttraction', '$numberOfTickets')";

        if ($conn->query($sql) === TRUE) {
            echo "Objednávka bola úspešne odoslaná!";
        } else {
            echo "Chyba pri odoslaní: " . $conn->error;
        }
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
                <h1>Objednávka</h1>
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

    <?php if(!empty($user)) { ?>
    <div class="formular" id="formular">
        <h2>Objednávka</h2>
        <form name="formular" action="objednavky.php" method="post">
        <p>Vyberte atrakciu:</p>
        <select id="atrakcia" name="atrakcia" onchange="updateOptions()">
            <option value="">Vyberte</option>
            <option value="hrady">Hrady</option>
            <option value="zamky">Zámky</option>
            <option value="jaskyne">Jaskyne</option>
            <option value="parky">Národné parky</option>
        </select><br>
        
        <p>Vyberte miesto:</p>
        <select id="miesto" name="miesto">
            <option value="">Najprv vyberte atrakciu</option>
        </select><br>
        
        <p>Vyberte dátum návštevy:</p>
        <input type="date" id="datum" name="datum" required><br>
        
        <p>Počet lístkov:</p>
        <input type="number" id="pocet" name="pocet" min="1" required><br>
        <br>
        <p>Celková cena: <span id="totalPrice">0</span> €</p>
        <input type="hidden" name="totalPrice" id="totalPriceInput" value="0">
        <br>
        <input type="submit" value="Odoslať objednávku">
        <input type="reset" value="Vymazať"><br>
        </form>
    </div>
    <?php } else { ?>
        <div class="formular" id="formular">
            <!-- <h2>Objednávka</h2> -->
            <p style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; width: 100%;">Pre vytvorenie objednávky musíte byť prihlásený</p>
        </div>
    <?php } ?>
 
    <!-- Footer na spodku -->
<footer style=" position: fixed; bottom: 0; width: 100%; ">
    <p>Autor: Martin Mohelník</p>
    <p>Skupina: 3ZKA1Aa</p>
    <p>ID: 319283</p>
</footer>


<!-- Skript na výber atrakcii -->
<script>
function updateOptions() {
    var atrakcia = document.getElementById("atrakcia").value;
    var miesto = document.getElementById("miesto");
    miesto.innerHTML = "";

    var options = {
        "hrady": [
            {
                "id": 1,
                "name": "Bratislavský hrad", 
                "price": 5.5
            }, 
            {
                "id": 2,
                "name": "Oravský hrad", 
                "price": 4.8
            }  
        ],

        "zamky": [
            {
                "id": 3,
                "name": "Bojnický zámok",
                "price": 4.5
            }, 
            {
                "id": 4, 
                "name": "Starý zámok Banská Štiavnica",
                "price": 5
            }
        ],
        "jaskyne": [
            {
                "id": 5, 
                "name": "Demänovská jaskyňa slobody",
                "price": 6.7
            }, 
            {
                "id": 6,
                "name": "Dobšinská ľadová jaskyňa",
                "price": 6.2
            }
        ],

        "parky": [
            {
                "id": 7,
                "name": "Vysoké Tatry",
                "price": 2 
            },
            {
                "id": 8,
                "name": "Slovenský raj",
                "price": 3
            }
        ]
    };
    
    if (options[atrakcia]) {
        options[atrakcia].forEach(function(place) {
            var option = document.createElement("option");
            option.value = place["id"];
            option.textContent = place["name"] + " " + place["price"] + "€/ks";
            miesto.appendChild(option);
        });
    } else {
        var defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "Najprv vyberte kategóriu";
        miesto.appendChild(defaultOption);
    }
}

// Skript na výpočet celkovej ceny
function calculateTotal() {
    var miesto = document.getElementById("miesto").value;
    var atrakcia = document.getElementById("atrakcia").value;
    var pocet = document.getElementById("pocet").value;
    var totalPriceElement = document.getElementById("totalPrice");

    var options = {
        "hrady": [
            {
                "id": 1,
                "name": "Bratislavský hrad", 
                "price": 5.5
            }, 
            {
                "id": 2,
                "name": "Oravský hrad", 
                "price": 4.8
            }  
        ],

        "zamky": [
            {
                "id": 3,
                "name": "Bojnický zámok",
                "price": 4.5
            }, 
            {
                "id": 4, 
                "name": "Starý zámok Banská Štiavnica",
                "price": 5
            }
        ],
        "jaskyne": [
            {
                "id": 5, 
                "name": "Demänovská jaskyňa slobody",
                "price": 6.7
            }, 
            {
                "id": 6,
                "name": "Dobšinská ľadová jaskyňa",
                "price": 6.2
            }
        ],

        "parky": [
            {
                "id": 7,
                "name": "Vysoké Tatry",
                "price": 2 
            },
            {
                "id": 8,
                "name": "Slovenský raj",
                "price": 3
            }
        ]
    };

    options[atrakcia].forEach(element => {
        if(element["id"] == miesto) {
            miesto = element["name"] + " " + element["price"] + "€/ks";
        }
    });

    if (miesto && pocet) {
        var priceMatch = miesto.match(/(\d+(\.\d+)?)€/);
        if (priceMatch) {
            var pricePerTicket = parseFloat(priceMatch[1]);
            var totalPrice = pricePerTicket * parseInt(pocet);
            totalPriceElement.textContent = totalPrice.toFixed(2);
            document.getElementById("totalPriceInput").value = totalPrice.toFixed(2);
        } else {
            totalPriceElement.textContent = "0";
            document.getElementById("totalPriceInput").value = "0";
        }
    } else {
        totalPriceElement.textContent = "0";
        document.getElementById("totalPriceInput").value = "0";
    }
}

// Event listener na prepočet ceny pri zmene výberu alebo počtu lístkov
document.getElementById("miesto").addEventListener("change", calculateTotal);
document.getElementById("pocet").addEventListener("input", calculateTotal);
</script>