<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/index.css">
    <link rel="stylesheet" href="Scrollbar/scrollbar.css">
    <link rel="stylesheet" href="Css/galeria.css">
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
        <?php } else{ ?>
        <li class="hideOnMobile"><a href="bejelentkezes.php">Bejelentkezés</a></li>
        <?php } ?>
        <li onclick="showSideBar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
    </ul>
</nav>

<div class="container">
    <h1 class="title">Farkas Sándor Munkái</h1>
    <div class="photo-gallery">
        <div class="collumn">
            <div class="photo">
                <img src="https://i.pinimg.com/474x/7a/9e/5c/7a9e5c85f9a87b0f485a221b660a01e7.jpg" alt="">
            </div>
            <div class="photo">
                <img src="https://i.pinimg.com/474x/d5/f5/44/d5f544fa972540dce3ffef0ef89912e0.jpg" alt="">
            </div>
            <div class="photo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTt1Suqjn5YHPtbkKn2DDCk-hXkJFiWJdlAxN4OrxSc-w&s" alt="">
            </div>
        </div>
        <div class="collumn">
            <div class="photo">
                <img src="https://i.pinimg.com/474x/da/cd/7e/dacd7e810123a1f56656b1be605d204c.jpg" alt="">
            </div>
            <div class="photo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3gYCrbn1XsBvisosD_6pfW1INAxQI1nvQY8K8mo2enw&s" alt="">
            </div>
            <div class="photo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSug60JfcSGu97vnz1Vi_rBwkx5sXAWmrTcThKTqD90cQ&s" alt="">
            </div>
        </div>
        <div class="collumn">
            <div class="photo">
                <img src="https://cdn.shopify.com/s/files/1/2384/0833/files/13_Textured_Fringe_1024x1024.jpg?v=1668876361" alt="">
            </div>
            <div class="photo">
                <img src="https://cdn.shopify.com/s/files/1/0577/1175/5424/files/IMG-20230302-WA0004_480x480.jpg?v=1679911411" alt="">
            </div>
            <div class="photo">
                <img src="https://cdn.shopify.com/s/files/1/2081/8453/files/joshlamonaca-medium-scissor-cut-hair-hairstyle-for-men_large.jpg?v=1508107797" alt="">
            </div>
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