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
                <h1>Zámky</h1>
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

    <div class="zamky">
        <div class="bojnickyzamok">
            <h1>Bojnický zámok</h1>
            <p>Klenotom Bojníc, mestečka pri Prievidzi, je rozprávkový Bojnický zámok, ktorý patrí k najnavštevovanejším a najkrajším zámkom nielen na Slovensku, ale aj v strednej Európe.</p>
            <p>Neoddeliteľnou časťou zámockého areálu je park a lesopark, ktorý dotvára jeho pôsobivú kulisu.</p>
            <p>Pred zámockým vchodom stojí známa šesťstoročná Bojnická lipa kráľa Mateja s obvodom okolo 12,5 metra.</p>
            <p>Bojnickému zámku patrí aj priľahlý zámocký park, v ktorom rastie veľa rôznych exemplárov stromov a vzácna, približne sedemstoročná, lipa pred vchodom do zámku.</p>
            <p>Ďalším lákadlom bezprostredného okolia zámku sú predstavenia skupiny historického šermu Bojník, stála scéna sokoliarov Aquila či návšteva zoologickej záhrady.</p>
            <p>Je postavený na travertínovej skale a tvorí ho vnútorný a vonkajší hrad s tromi nádvoriami. V roku 1970 bol vyhlásený za Národnú kultúrnu pamiatku.</p>
            <br>
            <img src="https://th.bing.com/th/id/R.31cf6aee54f3a8378cc3b862e57e041a?rik=ZpL1%2ft4EOJ0wsQ&pid=ImgRaw&r=0" alt="Bojnický zámok">
        </div>

        <hr style="color: aliceblue; width: 90%; margin: 0 5%;">

        <div class="szbanskastiavnica">
            <h1>Starý zámok Banská Štiavnica</h1>
            <p>Starý zámok v meste Banská Štiavnica patrí medzi kamenné dominanty a najstaršie pamiatky v meste.</p>
            <p>Pri návšteve uvidíte všetky stredoveké stavebné slohy – románsky, gotický, renesančný aj barokový.</p>
            <p>Zámok sa nachádza nad Námestím sv. Trojic pod úpätím vrchu Paradajz.</p>
            <p>Vznikol v 15. storočí po renesančnej prestavbe románsko-gotického kostola Panny Márie z 13. storočia, postaveného komunitou baníkov.</p>
            <p>Dominantou zámku je gotická hradná veža a Kaplnka sv. Michala (tiez nazývaná ‚karner‘), ktorej podzemná časť ‚ossarium‘ slúžila na uchovanie nezotletých kostí pri kopaní nových hrobov.</p>
            <p>Dnes zámok slúži Slovenskému banskému múzeu a je otvorený celoročne. Počas letnej sezóny sa na zámku konajú kultúrne podujatia a divadelné predstavenia.</p>
            <br>
            <img src="https://dobrodruh.sk/sites/prod/files/2016%20B%20Stiavnica%20Stary%20zamok%20(8).JPG" alt="Starý zámok Banská Štiavnica">
        </div>
    </div>

    <footer>
        <p>Autor: Martin Mohelník</p>
        <p>Skupina: 3ZKA1Aa</p>
        <p>ID: 319283</p>
    </footer>

</body>
</html>