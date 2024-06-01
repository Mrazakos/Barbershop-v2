<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Scrollbar/scrollbar.css">
    <link rel="stylesheet" href="Css/szolgaltatasok.css ">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    </style>
    <title>Barbershop | Szolgaltatasok</title>

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
        <div class="szoveg">
            <h1>Örülünk, hogy itt vagy!</h1>
            <p>Görgess lentebb, és válogass igényeid szerint szolgáltatásainkból.</p>
        </div>     
        <div class="main">
            <div class="grid-container">
                <div><p>Hajvágás</p><!-----------------><img src="kepek/ollo.png" alt=""><!---------------------------><p class="ar">3.000 Ft</p></div>
                <div><p>Gépi borotválás</p><!----------><img src="kepek/hajnyirogep.png" alt=""><!--------------------><p class="ar">2.000 Ft</p></div>
                <div><p>Klasszikus borotválás</p><!----><img src="kepek/borotvapenge.png" alt=""><!-------------------><p class="ar">1.500 Ft</p></div>
                <div><p>Teljes átalakítás</p><!--------><img src="kepek/teljesatalakitas.png" alt="" id="teljesatalakitas"><!---------------><p class="ar">4.000 Ft</p></div>
                <div><p>Orr gyanta</p><!---------------><img src="kepek/orrgyanta.png" alt="" id="orrgyanta"><!-------><p class="ar">500 Ft</p></div>
                <div><p>Fül gyanta</p><!---------------><img src="kepek/fülgyanta.png" alt="" id="fülgyanta"><!-------><p class="ar">800 Ft</p></div>
                <div><p>Hajfestés</p><!----------------><img src="kepek/hajfestes.png" alt=""><!----------------------><p class="ar">7.000 Ft</p></div>
                <div><p>Gyerek hajvágás</p><!----------><img src="kepek/gyerekhajvagas.png" alt=""><!-----------------><p class="ar">1.500 Ft</p></div>
            </div>
        </div>
    </div>

    <script src="Scrollbar/main.js"></script>
    <script>customScroll();</script>
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
