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
                <h1>Jaskyne</h1>
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

    <div class="jaskyne">
        <h1>Demänovská jaskyňa slobody</h1>
        <p>Jaskyňa bola objavená dňa 3.8.1921 moravským učiteľom Aloisom Kráľom, jej časť bola sprístupnená verejnosti už v roku 1924, ale dnešnú podobu nadobudla až v roku 1933.</p>
        <p>Najzaujímavejším úkazom jaskyne je Večný dážď, nevysýchajúci vodopád padajúcej vody z jaskynného stropu.</p>
        <p>Unikátom je i Kamenný luster a pod ním ležiaca mohyla moravského skladateľa, Leoša Janáčka, ktorého zvuk kvapkajúcej vody v jaskyni inšpiroval k dielu Všudybyl.</p>
        <p>Pri návšteve jaskyne si návštevník môže vybrať medzi tradičnou prehliadkou s dĺžkou 1800 m, ktorá trvá asi 60 minút a dlhou prehliadkou, ktorá je 300 m dlhšia a trvá 100 minút.</p>
        <br>
        <iframe width="900" height="500" src="https://www.youtube.com/embed/hF73BzWpGpQ?si=oHfgRUeT-UYjbC9t" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

        <h1>Dobšinská ľadová jaskyňa</h1>
        <p>Skutočný krasový unikát v Slovenskom raji je najväčšou ľadovou jaskyňou na Slovensku s dĺžkou 1483 m a vertikálnym rozpätím 112 m.</p>
        <p>Jej objaviteľom sa v roku 1870 stal kráľovský banský radca Eugen Ruffínyi, pričom už nasledujúci rok bola jaskyňa sprístupnená verejnosti.</p>
        <p> Do roku 1946 v nej bolo povolené korčuľovanie pre verejnosť a trénoval v nej aj známy československý krasokorčuliar Karol Divín.</p>
        <p>Priestory Dobšinskej ľadovej jaskyne boli kedysi spojené so Stratenskou jaskyňou, oddelil ich však sutinový zával z jaskynného stropu, ktorý súčasne vytvoril ideálne podmienky pre zaľadnenie Dobšinskej jaskyne.</p>
        <p>Na tvorbu jej jaskynných útvarov mala vplyv aj rieka Hnilec modelujúca podzemné priestory a studený vzduch prenikajúci do jaskyne v zime meniaci presakujúcu vodu na ľadové stalaktity, stalagmity, ľadopády a podlahový ľad.</p>
        <br>
        <iframe width="900" height="500" src="https://www.youtube.com/embed/Cc1zBU3rLlM?si=LBfxevi-qOc7Gb7r" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <br>
        <a href="file:C:\Users\marti\OneDrive\Počítač\V.Škola\3.ročník\Informačné systémy\html_semestálka\04261033GEOG_1957_2_Droppa.pdf" target="_blank">Dobšinská ľadová jaskyňa v PDF</a>
    </div>

    <footer>
        <p>Autor: Martin Mohelník</p>
        <p>Skupina: 3ZKA1Aa</p>
        <p>ID: 319283</p>
    </footer>

</body>
</html>