<?php
//kapcsolat
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershop";

$con = mysqli_connect($servername, $username, $password, $dbname);
//----------

if (isset($_POST['submit'])) {
    //adatok beolvasása
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    $barberName = "BárBár";

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");
//hiba ellenőrzés
    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            $imageFullName = $fileName . "." . uniqid("", false) . "." . $fileActualExt;
            $fileDestination = "kepek/gallery/" . $imageFullName;

            $query = "select * from gallery";
            //prepared statement
            $stmt = mysqli_stmt_init($con);

            if (!mysqli_stmt_prepare($stmt, $query)) {
                echo "Hiba történt!";
            }else {
                mysqli_stmt_execute($stmt);
                //order oszlop kiszámítása
                $result = mysqli_stmt_get_result($stmt);
                $rowCount = mysqli_num_rows($result);
                $setOrder = $rowCount + 1;

                $query = "insert into gallery (barberName,imgFullName,orderGallery) Values (?, ?, ?);";
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    echo "Hiba történt!";
                } else {
                    //paraméterek beállítása
                    mysqli_stmt_bind_param($stmt, "sss", $barberName, $imageFullName, $setOrder);
                    //adatbázisba beállítása
                    mysqli_stmt_execute($stmt);

                    //file feltöltése a szerverre(localhostra)
                    move_uploaded_file($fileTempName, $fileDestination);

                    $query = "Select * from gallery where barberName = '$barberName' Order by orderGallery";
                    $result = mysqli_query($con, $query);
                    $rows = mysqli_num_rows($result);
                    if ($rows > 12){
                        while($row = mysqli_fetch_assoc($result)){
                            $fileName = $row['imgFullName'];
                            unlink("kepek/gallery/" . $fileName);
                            $rows--;
                            if ($rows == 12){
                                break;
                            }
                        }

                    }


                    $location = $barberName . "-galeria.php?upload=success";
                    header("Location: $location");
                }
            }

        } else {
            echo "Hiba történt a fájl feltöltésével kapcsolataban";
            exit();
        }
    } else{
        echo "Rossz formátumú fájl.";
        exit();
    }


}