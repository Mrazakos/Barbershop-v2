<?php

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/kezdolap.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    </style>
    <title>BarberShop | Kezdőlap</title>
</head>
<body>
    <div class="egesz">
        <nav>
            <ul class="sidebar">
                <li onclick="hideSideBar()"><a href=""><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="index.php">Kezdőlap</a></li>
                <li><a href="szolgaltatasok.php">Szolgáltatások</a></li>
                <li><a href="rolunk.php">Rólunk</a></li>
                <li><a href="velemenyek.php">Vélemények</a></li>
                <li><a href="booking-barber.php">Időpontfoglalás</a></li>
                <?php
                session_start();
                if (isset($_SESSION["user_id"])){
                    ?>
                    <li><a href="kijelentkezes.php">Kijelentkezés</a></li>
                    <li><a href="profil.php">Profil</a></li>
                <?php } else{ ?>
                    <li><a href="bejelentkezes.php">Bejelentkezés</a></li>
                <?php } ?>
            </ul>
            <ul class="navbar">
                <li class="hideOnMobile"><a href="index.php">Kezdőlap</a></li>
                <li class="hideOnMobile"><a href="szolgaltatasok.php">Szolgáltatások</a></li>
                <li class="hideOnMobile"><a href="rolunk.php">Rólunk</a></li>
                <li class="hideOnMobile"><a href="velemenyek.php">Vélemények</a></li>
                <li class="hideOnMobile"><a href="booking-barber.php">Időpontfoglalás</a></li>
                <?php
                if (isset($_SESSION["user_id"])){
                    ?>
                    <li class="hideOnMobile"><a href="kijelentkezes.php">Kijelentkezés</a></li>
                    <li class="hideOnMobile"><a href="profil.php">Profil</a></li>
                <?php } else{ ?>
                    <li class="hideOnMobile"><a href="bejelentkezes.php">Bejelentkezés</a></li>
                <?php } ?>
                <li onclick="showSideBar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
        </nav>
        <h1 class="szoveg">Szükséged van egy profi hajvágásra<br>és méghozzá gyorsan is?</h1>
        <h3>Ne aggódj, ránk számíthatsz!</h3>
        <p>Igényeid szerint alakíthatod, hogy mely szolgáltatásunkat/szolgáltatásainkat szeretnéd igénybe venni.
            Hogy pontosabb képet kapj arról, hogy mit is ajánlunk Neked, ránézhetsz a <a href="#" class="link">Vélemények</a> fülön az előző ügyfeleinken végzett munkáinkra.</p>
        <div class="gomb">

            <a href="booking-barber.php"><button type="button"><span></span>Foglalok!</button></a>
        </div>
    </div>

    <script>
        function showSideBar(){
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = "flex"
        }

        function hideSideBar(){
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = "none";
        }
    </script>
</body>
</html>