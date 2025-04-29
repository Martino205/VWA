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
                <h1>Hrady</h1>
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

    <div class="hrady">
            <div class="bratislavkyhrad">
                <h1>Bratislavský hrad</h1>
                <p>Bratislavský hrad je komplex budov v historickej oblasti, ktorý zaberá vrchol kopca na juhozápadnom ostrohu hrebeňa Malých Karpát na ľavom brehu Dunaja v Bratislave.</p>
                <p>Hradu dominuje monumentálna stavba bývalého kráľovského paláca, ktorá tvorí nerozlučnú panorámu hlavného mesta Slovenska.</p>
                <p>Bratislavský hrad je svojou úlohou v dejinách Veľkej Moravy, Maďarska, Československa a moderného Slovenska významnou pamiatkou spoločensko-historického vývoja v tejto oblasti.</p>
                <p>Bratislavský hrad bol v roku 1961 vyhlásený za Národnú kultúrnu pamiatku Slovenskej republiky.</p>
                <br>
                <img src="https://www.kulturnecesty.sk/wp-content/uploads/2021/02/bratislavsky-hrad.jpg" alt="Bratislavsky hrad">
                <div class="bhmap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2662.347337819113!2d17.097659876423336!3d48.1421085712439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c895d93b150c5%3A0x2fd320efbc06a139!2sBratislavsk%C3%BD%20hrad!5e0!3m2!1ssk!2ssk!4v1696880736018!5m2!1ssk!2ssk" width="700" height="300" style="border:0; padding-top: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            </div>
    
            <div class="oravskyhrad">
                <h1>Oravský hrad</h1>
                <p>Oravský hrad je expozícia Oravského múzea.</p>
                <p>Je jeden z najkrajších hradov na Slovensku a nachádza sa v obci Oravský Podzámok.</p>
                <p>Je to výrazná dominanta oravského regiónu, patrí medzi najvýznamnejšie pamiatky hradného staviteľstva na území Slovenska.</p>
                <p>Hrad je sprístupnený verejnosti denne od mája do marca.</p>
                <p>Oravský hrad tvorí rad budov sledujúcich tvar hradného vrchu a brala. V roku 1556 sa dostal do rúk Thurzovcom, ktorí uskutočnili jeho najrozsiahlejšiu prestavbu.</p>
                <br>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Oravsk%C3%BD_hrad_%28celkov%C3%BD_pohled%29.jpg/1280px-Oravsk%C3%BD_hrad_%28celkov%C3%BD_pohled%29.jpg" alt="Oravsky hrad">
                <div class="ohmap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2603.768676715482!2d19.3559959764877!3d49.26183027138964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4715b0e5e2ceabed%3A0xdf5a09bde3c59fdd!2sOravsk%C3%BD%20hrad!5e0!3m2!1ssk!2ssk!4v1696883252432!5m2!1ssk!2ssk" width="700" height="300" style="border:0; padding-top: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            </div>
    </div>

    <footer>
        <p>Autor: Martin Mohelník</p>
        <p>Skupina: 3ZKA1Aa</p>
        <p>ID: 319283</p>
    </footer>

</body>
</html>

    