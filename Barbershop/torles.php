<?php
session_start();
include ("kapcsolat.php");
global $con;
if (isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $query = "Delete from users where user_id = '$id'";
    mysqli_query($con, $query);
    header("Location: kijelentkezes.php");
    die;

}
