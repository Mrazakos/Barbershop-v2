<?php
session_start();

include ("kapcsolat.php");
include ("fuggvenyek.php");

$helyes = true;

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = $_SESSION['user_id'];
    $new_password = $_POST['new_password'];
    $password = $_POST['password'];
    if (!empty($new_password) && !empty($password)){
        global $con;

        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($password, $user_data['password'])){
                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $query = "Update users Set password = '$new_password' where user_id = '$id'";
                    mysqli_query($con, $query);
                    header('Location: profil.php');
                    die;
                }
                else{
                    global $helyes;
                    $helyes = false;


                }
            }

    } else {
        global $helyes;
        $helyes = false;
    }

}
?>


<!doctype html>
<html lang="hu">
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Css/bejelentkezes.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    </style>
    <title>Barbershop | Bejelentkezés</title>
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
    </div>
    <div id="forum">
        <form method="post">
            <h2>Jelszó megvátoztatása</h2>
            <div class="input-box">
                <input type="password" name="password" id="password" class="input-mezo" required >
                <label for="password">Régi Jelszó</label>
            </div>

            <div class="input-box">

                <input type="password" id="new_password" class="input-mezo" name="new_password" required>
                <label for="new-password">Új Jelszó</label>
            </div>

            <?php

            if (!$helyes){
                echo '<div style="color: red !important;text-align: center;margin-inline: auto;margin-bottom: 20px;">Hibás jelszó</div>';

            }

            ?>

            <button type="submit" value="Bejelentkezés">Jelszó vátoztatás</button>



        </form>
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