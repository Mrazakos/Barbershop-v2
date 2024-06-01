<?php
session_start();
include ("kapcsolat.php");
global $con;

if (isset($_SESSION['user_id'])){
    
      $user_id = $_SESSION["user_id"];
    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);

    $user_name = $user_data['user_name'];
    $email = $user_data['email'];

      $toDelete = "DELETE FROM appointment WHERE user_name = '$user_name'";
      mysqli_query($con, $toDelete);

}

header('Location: index.php');
exit;

