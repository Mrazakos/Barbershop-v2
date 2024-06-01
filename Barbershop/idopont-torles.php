<?php
include "kapcsolat.php";
global $con;
$user_id = $_SESSION["user_id"];
$sql = "Select * from users where user_id = '$user_id'";
$result = mysqli_query($con, $sql);
$user_data = mysqli_fetch_assoc($result);
$date = date("y-m-d");
$time = date("h:m:s");
$user_name = $user_data['user_name'];
$query = "Select * from appointment where user_name = '$user_name'";
$result = mysqli_query($con, $query);
while($appointment = mysqli_fetch_assoc($result)){
    if ($date < $appointment[""]){
        if ($time < $appointment[""]){
            $query = "Delete from appointment where user_name = '$user_name' AND AND";
        }


    }
}
header("Location: index.php");
die;