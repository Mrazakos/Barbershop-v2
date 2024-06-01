<?php
    include ("fuggvenyek.php");
    include ("kapcsolat.php");
    global $con;


?>
<!doctype html>
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/index.css">
    <link rel="stylesheet" href="Css/navbar.css">

    <link rel="stylesheet" href="Css/rolunk.css">
    <link rel="stylesheet" href="Css/profil.css?v=<?php echo time(); ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    </style>
    <title>Barbershop | Profil</title>
</head>
<body id="body">
<div class="custom_scroll">
    <div id="scroll_block" class="scroll_block"></div>
</div>

<div class="egesz">
    <div style="margin: 0 0 0 auto">
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
                <?php
                header("Location: bejelentkezes.php");
                } ?>
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
    <header>
        <h1>Profil</h1>
    </header>
    <?php
    $user_id = $_SESSION["user_id"];
    $query = "Select * from users where user_id = '$user_id' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);

    $user_name = $user_data['user_name'];
    $email = $user_data['email'];
    $imgFullName = $user_data['imgFullName'];
    $location = "kepek/profilkepek/" . $imgFullName;
    ?>
    <div class="profil">

        <div class = profilkep>
            <div class = "kep">
                <?php
                global $location;
                    echo <<<END
                    <img src="$location">
                    END;
                ?>

            </div>
            <form action="profilkep-feltoltes.php" method="post" enctype="multipart/form-data">
                <div class="input-box"><input class="upload-box" type="file" name="file" style="" ></div>
                <div class="input-box"><button type="submit" name="submit">Feltöltés</button></div>
            </form>
        </div>
        <div class="vonal" style="width: 1px; border-color: #d5de28;border-width: 2px; z-index: 100;"></div>
        <div class="adatok">
            <?php


            echo <<<END
                <div class="adat"><h3>Felhasznalonev:</h3>
                <p>$user_name</p>
            </div >
            <div class="adat"><h3> Email:</h3>
                <p>$email</p>
            </div >
            END;


            ?>


            <div  class="valtoztatas adat"><a href="jelszo-valtoztatas.php">Jelszó megváltoztatása.</a></div >

            <div  class="torles adat"><a href="torles.php">Fiókom törlése!</a></div>

            <div class = "appointment_delete" name="submit"><a href="appointment_delete.php">Foglalásaim törlése.</a></div>

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
