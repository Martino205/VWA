<?php
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
                <h1>Národné parky</h1>
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

    <div class="narodneparky">
        <div class="vysoketatry">
            <h1>Vysoké Tatry</h1>
            <p>Národný park Vysoké Tatry sa nachádza na severe Slovenska a je čiastočne zdieľaný s Poľskom.</p>
            <p>Jediné hory alpského typu v celom pohorí Karpát sú často nazývané „najmenšie pohorie v Európe“.</p>
            <br>
            <p><span style="font-weight: bold; text-decoration: underline;">Existujú tri hlavné časti Vysokých Tatier:</span></p>
            <ol>
                <li>Západné Tatry</li>
                <li>(Centálne) Vysoké Tatry</li>
                <li>Belianske Tatry</li>
            </ol>
            <p>Líšia sa geologickým zložením a umiestnením. Obyvatelia Vysokých Tatier žijú v osadách pozdĺž „Cesty slobody„, ktorá spája Západné, Vysoké a Belianske Tatry.</p>
            <br>
            <p><span style="font-weight: bold; text-decoration: underline;">Známe vrcholy:</span></p>
            <ul>
                <li>Gerlachovský štít (2.655 m)</li>
                <li>Lomnický štít (2.634 m)</li>
                <li>Kriváň (2.494 m)</li>
            </ul>
            <br>
            <div class="viac">
                <h1><a href="https://www.slovakia.com/sk/narodne-parky/vysoke-tatry/" target="_blank">VIAC</a></h1>
            </div>
            <br>
            <img src="https://www.slovakia.com/wp-content/uploads/1362411164_strbske-tarn-In-High-Tatras.jpg" alt="Vysoké Tatry">
        </div>

        <hr style="color: aliceblue; width: 90%; margin: 0 5%;">

        <div class="slovenskyraj">
            <h1>Slovenský raj</h1>
            <p>Slovenský raj je plný živých lesov, širokých lúk a planín, priepastí, kaňonov, tiesňav, podzemných jaskýň (až 350!) a zurčiacich vodopádov.</p>
            <p>Tento populárny severovýchodný región je klenot medzi slovenskými národnými parkami.</p>
            <p>300 km označených trás sa tiahne cez tento očarujúci raj. Aj keď to môže vyzerať tak, že väčšina turistických chodníkov nie je tak náročná a prevýšenie nie je veľké, tieto trasy sú prinajmenšom dobrodružné.</p>
            <p><span style="font-weight: bold; text-decoration: underline;">Najpopulárnejšie náučné chodníky a turistické body:</span></p>
            <ul>
                <li>Prielom Hornádu</li>
                <li>Tomášovský výhľad</li>
                <li>Kláštorisko</li>
                <li>Kyseľ</li>
                <li>Veľký a Malý Sokol</li>
            </ul>
            <br>
            <div class="viac">
                <h1><a href="https://www.slovakia.com/sk/narodne-parky/slovensky-raj/" target="_blank">VIAC</a></h1>
            </div>
            <br>
            <img src="https://www.slovakia.com/wp-content/uploads/alex-3VbY4ZnTS8U-unsplash-1.jpg">
        </div>
    </div>

    <footer>
        <p>Autor: Martin Mohelník</p>
        <p>Skupina: 3ZKA1Aa</p>
        <p>ID: 319283</p>
    </footer>

</body>
</html>