<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: bejelentkezes.php");
}
?>


<html lang="hu">
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/navbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Css/booking-calendar.css?v=<?php echo time(); ?>">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');

        .barbers {
            display: flex;
            flex-direction: row;
            width: 98%;
            margin: auto;
            margin-top: 100px;
        }

        .barber-image{
            width: 260px;
            height: 260px;
            border: #d5de28 1px solid;
            border-radius: 10px;
            margin: 30px 10px;
            padding: 5px;
        }
        img{
            width: 250px;
            height: 250px;
        }
    </style>

    <title>Barbershop | Időpontok</title>
</head>
<body>
<div class="egesz">

    <div>
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
    </div>


        <div class="container" style="background: rgb(0,0,0, 0.7); border: #d5de28 solid 1px !important; border-radius: 20px; height: 600px">

            <div class="barbers">
                <div style="display: flex; flex-direction: column">
                <a href="booking-calendar.php?barber=Titan">

                    <div class="barber-image">
                        <img src="kepek/Titán-Tépőzár.jpg" alt="Titán Tépőzár">
                    </div>

                </a>
                    <h3>Titán Tépőzár</h3>
                </div>

                <div style="display: flex; flex-direction: column">
                    <a href="booking-calendar.php?barber=Sandor">

                        <div class="barber-image">
                            <img src="kepek/varazs.webp" alt="Farkas Sándor">
                        </div>

                    </a>
                    <h3>Farkas Sándor</h3>
                </div>

                <div style="display: flex; flex-direction: column">
                    <a href="booking-calendar.php?barber=Berto">

                        <div class="barber-image">
                            <img src="kepek/Borzas.webp" alt="Borzas Bertó">
                        </div>

                    </a>
                    <h3>Borzas Bertó</h3>
                </div>

                <div style="display: flex; flex-direction: column">
                    <a href="booking-calendar.php?barber=BárBár">

                        <div class="barber-image">
                            <img src="kepek/BárBár.webp" alt="BarBar">
                        </div>

                    </a>
                    <h3>BárBár</h3>
                </div>
            </div>
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