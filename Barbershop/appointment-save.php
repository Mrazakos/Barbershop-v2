<?php
session_start();
include ("kapcsolat.php");
global $con;
$error = false;
if (isset($_SESSION["user_id"])){
    $query = "Select * from users where user_id = ".$_SESSION["user_id"];
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    $userName = $user_data["user_name"];
    $email = $user_data["email"];

    if (isset($_POST["booking"])){

        $barber = $_POST["barber"];
        $date_day = $_POST["date_day"];
        $date_hour = $_POST["date_hour"];
        $trimnose = isset($_POST["trim_nose"]) ? 1 : 0;
        $trimear = isset($_POST["trim_ear"]) ? 1 : 0;
        $service = $_POST["service"];
        $status = "booked";

        $query = "Insert Into appointment (user_name, email, barber, trim_nose, trim_ear, date_day, date_hour, service, status)
                    VALUES ('$userName', '$email', '$barber', '$trimnose', '$trimear', '$date_day', '$date_hour', '$service', '$status')";

        mysqli_query($con, $query);
        header("Location: index.php");

    }
}
?>
