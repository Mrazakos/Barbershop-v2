<?php
session_start();
if (isset($_SESSION["user_id"])){
    header("Location: index.php");
}

include ("kapcsolat.php");
include ("fuggvenyek.php");
$foglalt_email = false;
$foglalt_felhasznalonev = false;
$nem_azonos_jelszo = false;
$rossz_email = false;



if($_SERVER['REQUEST_METHOD'] == "POST")
    {


        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $passwordAgain = $_POST['passwordAgain'];
        $email = $_POST['email'];
        global $con;
        if (strpos($email, "@") === false){
            $rossz_email = true;
        }else {

        if (!empty($user_name) && !empty($password) && !empty($email) && $passwordAgain == $password){
            $query = "Select email from users where '$email' = email";
            $query2 = "Select user_name from users where '$user_name' = user_name";

            if (mysqli_query($con, $query) && mysqli_num_rows(mysqli_query($con, $query)) > 0){
                $foglalt_email = true;
            } else {
                if (mysqli_query($con, $query2) && mysqli_num_rows(mysqli_query($con, $query2)) > 0) {
                    $foglalt_felhasznalonev = true;
                } else {


                    $user_id = random_num(20);

                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $query = "insert into users (user_id,user_name,email,password) values ('$user_id','$user_name','$email','$password')";
                    mysqli_query($con, $query);

                    header('Location: bejelentkezes.php');
                    die;
                }
            }
        } else {
            $nem_azonos_jelszo = true;

        }
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
        #forum {
            min-height: 600px;
        }
    </style>
    <title>Barbershop | Regisztráció</title>
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
        <h2>Regisztráció</h2>
        <div class="input-box">
            <input type="text" id="address" class="input-mezo" name="email" required >
            <label for="address">E-mail</label>
        </div>
        <div class="input-box">

            <input type="text" id="username" class="input-mezo" name="user_name" required>
            <label for="user_name">Felhasználónév</label>
        </div>


        <div class="input-box">

            <input type="password" id="jelszo" class="input-mezo" name="password" required>
            <label for="jelszo">Jelszó</label>
        </div>
        <div class="input-box">

            <input type="password" id="jelszo-ujra" class="input-mezo" name="passwordAgain" required>
            <label for="jelszo">Jelszó-újra</label>
        </div>

        <?php

        if ($foglalt_email){
            echo '<div style="color: red !important;text-align: center;margin-inline: auto;margin-bottom: 20px; margin-top: -10px">Ehhez az email címhez már tartozik fiók!</div>';

        } elseif ($rossz_email){
            echo '<div style="color: red !important;text-align: center;margin-inline: auto;margin-bottom: 20px; margin-top: -10px">Az email cím formátuma nem megfelelő!</div>';

        }
        elseif ($foglalt_felhasznalonev){
            echo '<div style="color: red !important;text-align: center;margin-inline: auto;margin-bottom: 20px; margin-top: -10px">Ez a felhasználónév már foglalt!</div>';

        } elseif ($nem_azonos_jelszo){
            echo '<div style="color: red !important;text-align: center;margin-inline: auto;margin-bottom: 20px; margin-top: -10px">A két jelszó nem egyezik meg!</div>';

        }

        ?>

        <button id="button" type="submit" value="Regisztracio">Regisztráció</button>

        <div class="register" id="gomb-box">
            <p class="switch">Van már fiókod? <a href="bejelentkezes.php">Bejelentkezés</a></p>
        </div>

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