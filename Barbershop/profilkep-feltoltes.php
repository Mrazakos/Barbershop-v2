<?php
session_start();
include ("kapcsolat.php");

global $con;



if (isset($_POST['submit'])) {
    //adatok beolvasása
    $file = $_FILES['file'];
    $user_id = $_SESSION['user_id'];

    $query = "Select * from users where user_id = '$user_id'";
    $result = mysqli_query($con,$query);
    $data = mysqli_fetch_assoc($result);
    if ($data['imgFullName'] != "default_profile.jpg"){
        $name = $data['imgFullName'];

        unlink("kepek/profilkepek/" . $name);
    }


    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];


    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");
//hiba ellenőrzés
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $imageFullName = $fileName . "." . uniqid("", false) . "." . $fileActualExt;

            $fileDestination = "kepek/profilkepek/" . $imageFullName;
            $query = "UPDATE users SET imgFullName = '$imageFullName' WHERE user_id = '$user_id'";
            mysqli_query($con, $query);

            move_uploaded_file($fileTempName, $fileDestination);
            header("Location: profil.php");
            die;
        }
        else{
            echo "Hiba történt!";
        }
    } else{
        echo "Nem engedélyezett formátum";
    }
}
