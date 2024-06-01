<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/index.css">
    <link rel="stylesheet" href="Scrollbar/scrollbar.css">
    <link rel="stylesheet" href="Css/galeria.css?v=<?php echo time(); ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    </style>
    <title>Barbershop|Galéria</title>
</head>
<body id="body">
<div class="custom_scroll">
    <div id="scroll_block" class="scroll_block"></div>
</div>
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
<div class="container">
    <h1 class="title">BárBár Munkái</h1>
    <?php
    include("kapcsolat.php");

    if (isset($_SESSION["user_id"]))
    {
        global $con;
        $id = $_SESSION["user_id"];
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con, $query);
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['barber'] == 1){
            ?>
            <h2>Kép feltöltése</h2>
            <div class="center">
                <form action="BárBár-galeria-feltoltes.php" method="post" enctype="multipart/form-data">
                    <div class="input-box"><input class="upload-box" type="file" name="file" style=""></div>
                    <div class="input-box"><button type="submit" name="submit">Feltöltés</button></div>
                </form>
            </div>
            <?php
        }
    }
    ?>

    <div class="photo-gallery">

        <?php
        //kapcsolat
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "barbershop";

        $con = mysqli_connect($servername, $username, $password, $dbname);
        $barberName = "BárBár";
        $query = "Select * from gallery WHERE barberName = '$barberName' ORDER BY orderGallery Desc";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $query)){
            echo "Hiba történt";
        } else{
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $num = 0;
            while ($row = mysqli_fetch_assoc($result)){

                echo '<div class="photo" >
                <img src="kepek/gallery/'.$row['imgFullName'].'" alt="">
            </div>';
                if ($num == 11){
                    break;
                }
                $num++;
            }
        }




        ?>


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