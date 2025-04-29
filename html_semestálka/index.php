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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script> 
        $(document).ready(function(){
        $("#flip").click(function(){
            $("#panel").slideToggle("slow");
        });
        });
    </script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 999999;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

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
                <h1>Kde na Slovensku</h1>
            </div>

            <div class="pravemenu">
                <ul>
                    <li><a href="index.php">Domov</a></li>
                    <li><a href="hrady.php">Hrady</a></li>
                    <li><a href="zamky.php">Zámky</a></li>
                    <li><a href="jaskyne.php">Jaskyne</a></li>
                    <li><a href="narodneparky.php">Národné parky</a></li>
                    <li><a href="#chko">Chránené krajne oblasti</a></li>
                    <li><a href="formular.php">Recenzie</a></li>
                    <li><a href="objednavky.php">Objednávky</a></li>
                </ul>
            </div>
        </nav>
    </div>
    
    <div class="logo">
        <h1><a href="#start">Kde na Slovensku</a></h1>
    </div>

    <div class="text" id="start">
        <p>Toto sú najkrajšie miesta na Slovensku, ktoré musíte navštíviť!</p>
        <p><b>Slovensko má krásne mestá, ohromujúce hrady, úžasné zámky, pamiatky UNESCO no jeho hlavným a neprekonateľným pokladom je jeho príroda.</b></p> <!-- <b> text v bolte (zvýraznený) -->
        <p>Vyše 6000 jaskýň, 9 národných parkov, 14 chránených krajinných oblastí, 1087 prírodných rezervácií, prírodných pamiatok a chránených areálov… To všetko sa nachádza v jednej z najmenších krajín Európy a to priamo v jej srdci.</p>
    </div>

    <div class="hlavnemesto">
        <h1>Hlavné mesto Bratislava</h1>
        <p>Bratislava je hlavné a rozlohou aj počtom obyvateľov najväčšie mesto Slovenska.</p>
        <p>Nachádza sa na úpätí pohoria Malé Karpaty, medzi Záhorskou a Podunajskou nížinou.</p>
        <p>Mestom preteká rieka Dunaj, mimo centra aj rieka Morava.</p>
        <p>Bratislava leží na hranici s Rakúskom a Maďarskom, čím sa stáva jediným hlavným mestom na svete ležiacim na hranici troch suverénnych štátov.</p>
        <br>
        <img style="width: 100%; height: 100%" src="bratislava.jpg" alt="Hlavné mesto Slovenka">
    </div>

    <div class="Zilina">
        <h1>Mesto kde študujem Žilina</h1>
        <p>Žilina je krajské a okresné mesto na severnom Slovensku. Leží na sútoku riek Váh, Kysuca a Rajčanka.</p>
        <p>Počtom obyvateľov (spolu 80 758, 39 004 mužov, 41 754 žien poďľa údajov 28.02.2023) je Žilina štvrtým najväčším mestom na Slovensku.</p>
        <p>Mesto Žilina sa nachádza na sútoku Váhu s Kysucou a Rajčankou (pred ohybom Váhu zo západného smeru na juhozápadný a pred vstupom do centrálneho vysokého územia Západných Karpát)</p>
        <p>Nachádza sa tu aj Žilinska Univerzita v Žiline</p>
        <br>
        <img style="width: 100%; height: 100%" src="zilina.jpg" alt="Mesto Žilina">
    </div>
    
    <div class="chko" id="chko">
        <table class="tabulka">
            <h1>Chranené Krajne Oblasti</h1>
            <tr class="hlavickatabulky">
                <th>CHKO</th>
                <th>Vymera [ha]</th>
                <th>Stupeň ochrany</th>
                <th>Najvyšší bod [m]</th>
                <th>Vodná plocha [ha]</th>
                <th>Lesnatosť [%]</th>
            </tr>
            
            <tr>
                <td>Záhorie</td>
                <td>27 522</td>
                <td>2-5</td>
                <td>297</td>
                <td>1 150</td>
                <td>?</td>
            </tr>
            <tr>
                <td>Malé Karpaty</td>
                <td>64 610</td>
                <td>2-5</td>
                <td>768</td>
                <td>?</td>
                <td>86</td>
            </tr>
            <tr>
                <td>Dunájske Luhy</td>
                <td>128 400</td>
                <td>2-5</td>
                <td>395</td>
                <td>?</td>
                <td>20</td>
            </tr>
            <tr>
                <td>Východné Karpaty</td>
                <td>25 307</td>
                <td>2-5</td>
                <td>904</td>
                <td>?</td>
                <td>78</td>
            </tr>
            <tr>
                <td>Kysuce</td>
                <td>120 734</td>
                <td>2-5</td>
                <td>1 236</td>
                <td>1020</td>
                <td>?</td>
            </tr>
            <tr>
                <td>Stražovské Vrchry</td>
                <td>30 979</td>
                <td>2-5</td>
                <td>1 213</td>
                <td>?</td>
                <td>79</td>
            </tr>
            <tr>
                <td>Ponitrie</td>
                <td>37 655</td>
                <td>2-5</td>
                <td>1 346</td>
                <td>?</td>
                <td>96</td>
            </tr>
            <tr>
                <td>Poľana</td>
                <td>20 360</td>
                <td>4</td>
                <td>1 458</td>
                <td>890</td>
                <td>?</td>
            </tr>
          </table>
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776; Menu</span>
    </div>
    
    <div class="rozbal">
        <div id="flip">Klikni pre viac info. o mne</div>
        <div id="panel">Volám sa Martin <p> Študujem na Žilinskej Univerzite v Žiline <p> Momentálne som vo štvrtom ročníku <p> Študujem automatizáciu / riadenie systémov</p></div>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Domov</a>
        <a href="hrady.php">Hrady</a>
        <a href="zamky.php">Zámky</a>
        <a href="jaskyne.php">Jaskyne</a>
        <a href="narodneparky.php">Národné parky</a>
        <a href="formular.php">Recenzie</a>
      </div>

      
      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
      </script>

    <footer>
        <p>Autor: Martin Mohelník</p>
        <p>Skupina: 3ZKA1Aa</p>
        <p>ID: 319283</p>
    </footer>

</body>
</html>