<?php
session_start();
include ("kapcsolat.php");
global $con;
if(!isset($_SESSION['user_id'])){
    header("Location: bejelentkezes.php");
}

if (isset($_GET["date_day"])){
    $date = $_GET["date_day"];
} else{
    $date = date("Y-m-d");
}
$barber = $_GET["barber"];

$query = "Select * from appointment where barber = '$barber' AND date_day = '$date'";
$result = mysqli_query($con, $query);
$bookings = array();

while($booking = mysqli_fetch_assoc($result)){
    $bookings[] = $booking;
}

function get_num_appointments($date){
    global $con;
    $barber = $_GET["barber"];
    $query = "Select * from appointment where barber = '$barber' AND date_day = '$date'";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);
    return $num;
}


function build_calendar($month, $year, $bookingDate): string
{
    global $con;
    $bookings = array();
    $query = "Select * From appointment Where MONTH(date_day) = '$month' AND YEAR(date_day) = '$year'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)){
        $bookings[] = $row['date_day'];
    }

    // create array of all days in week
    $daysOfWeek = array("Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
    $months = array("Január", "Február", "Március" ,"Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "Decemeber");
    // get the first day of a month
    $firstDayOfMonth = mktime(0,0,0, $month, 1, $year);

    // get the number of days in a month
    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    //getting month and date
    $monthIndex = $dateComponents['mon'] - 1;
    $monthName = $months[$monthIndex];
    $dayOfWeek = $dateComponents['wday'];

    //getting current date
    $dateToday = date("Y-m-d");

    // creating html table

    $calendar= "<center><h2>$monthName $year</h2></center>";
    $prev_month = date('m', mktime(0,0,0,$month-1,1,$year));
    $prev_year = date('Y', mktime(0,0,0,$month-1,1,$month - 1 == 12 ? $year -1 : $year));
    $next_month = date('m', mktime(0,0,0,$month+1,1,$year));
    $next_year = date('Y', mktime(0,0,0,$month+1,1,$month + 1 == 01 ? $year -1 : $year));
    $calendar .= "<center><a class='btn btn-primary' href='?barber=".$_GET["barber"]."&month=".$prev_month."&year=".$prev_year."'>Előző Hónap</a>";
    $calendar .= "<a class='btn btn-primary' href='?barber=".$_GET["barber"]."&month=".$next_month."&year=".$next_year."'>Következő Hónap</a></center>";
    $calendar .= "<table class='table table-bordered'>";
    $calendar.= "<tr>";

    // adding headers
    foreach ($daysOfWeek as $day) {
        $calendar.= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr><tr>";

    if ($dayOfWeek > 0){
        for ($k = 0; $k < $dayOfWeek; $k++){
            $calendar.= "<td></td>";
        }
    }

    // day counter
        $currentDay = 1;
    //month number
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while($currentDay <= $numberDays){

        // if seventh col reached, start a new row
        if ($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.="</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        if ($bookingDate == $date){
            $calendar.= "<td class='today'><h4>$currentDay</h4></td>";
        } else if($date < $dateToday) {
            $calendar .= "<td><div class='btn btn-danger btn-xs' style='cursor: default'>$currentDay</div></td>";

        }
        else{
            if (get_num_appointments($date) == 9){
                $calendar .= "<td><div class='btn btn-danger btn-xs' style='cursor: default'>$currentDay</div></td>";
            }else{
                $calendar.= "<td><a href='booking-calendar.php?barber=".$_GET["barber"]."&date_day=".$date."&month=".$month."&year=".$year."' class='btn btn-success btn-xs' href=''>$currentDay</a></td>";
            }
        }



        $currentDay++;
        $dayOfWeek++;
    }

    //Completing last row

    if($dayOfWeek != 7){
        $remainingDays = 7-$dayOfWeek;
        for ($i = 0; $i<$remainingDays;$i++){
            $calendar.="<td></td>";
        }
    }

    $calendar.="</tr>";
    $calendar.="</table>";

    return $calendar;
}

function timeslots($duration, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");

    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end){
            break;
        }
        $slots[] = $intStart->format("H:iA"). "-" . $endPeriod -> format("H:iA");
    }
    return $slots;



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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/navbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Css/booking-calendar.css?v=<?php echo time(); ?>">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');

    </style>

    <title>Barbershop | Időpontok</title>
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
</div>
    <form action="appointment-save.php" method="post">

    <div class="container" style="background: rgb(0,0,0, 0.7); border: #d5de28 solid 1px !important; border-radius: 20px">



        <div class="row">
            <div class="col-md-12">
                <?php

                $dateComponents = getdate();
                $month = $dateComponents['mon'];
                $year = $dateComponents['year'];
                if (isset($_GET["date_day"])){
                    $dayNum = (integer)explode("-", $_GET["date_day"])[2];

                }
                $bookinDate = date("Y-m-d", mktime(0, 0, 0, $_GET["month"] ?? $month, $dayNum ?? date("d"), $_GET["year"] ?? $year));
                if (!isset($_GET["date_day"])){
                    echo build_calendar($_GET["month"] ?? $month, $_GET["year"] ?? $year, $bookinDate);
                } else{
                    echo build_calendar($_GET["month"], $_GET["year"], $bookinDate);
                }

                ?>
                <div class="timeslots">
                <?php


                    $timeslots = timeslots(60,"10:00", "19:00");

                    foreach ($timeslots as $ts){
                        $booked = false;
                        foreach ($bookings as $booking){
                            if ($ts == $booking["date_hour"]){
                                $booked = true;
                            }
                        }
                        if (!$booked){


                        ?>

                        <div class="col-md-2">
                            <label>
                            <div class="form-group btn btn-success ts">
                                <?php echo $ts?>
                                <input required style="display: none" type="radio" value="<?php echo $ts?>" name='date_hour'>
                            </div>
                            </label>
                        </div>

                <?php
                        }
                    }



                if (isset($_GET["date_day"])){
                    echo "<div><input checked type='checkbox' style='display: none' value='".$_GET["date_day"]."' name='date_day'></div>";
                } else{
                    echo "<div><input checked type='checkbox' style='display: none' value='".date("Y-m-d")."' name='date_day'></div>";
                }

                echo "<div><input style='display: none;' type='checkbox' checked value='".$_GET["barber"]."' name='barber'> </div>"

                ?>
                </div>

            </div>
        </div>

        <div class="row services">
            <div class="col-md-12">
                <label for="service"><h2>Szolgáltatás:</h2></label><br>
                <select name="service" id="service" required>
                    <option value="" disabled selected>Válaszd ki a szolgáltatást</option>
                    <option value="Hajvágás">Hajvágás   -   3.000 Ft</option>
                    <option value="Gépi">Gépi borotválás   -   2.000 Ft</option>
                    <option value="Klasszikus">Klasszikus borotválás   -   1.500 Ft</option>
                    <option value="Teljes átalakítás">Teljes átalakítás   -   4.000 Ft</option>
                    <option value="Hajfestés">Hajfestés   -   7.000 Ft</option>
                    <option value="Gyerekhajvágás">Gyerekhajvágás   -   1.500 Ft</option>
                </select>
            </div>
            <div class="col-md-12">
                <h2 class="szoveg">Extrák:</h2>
                <input type="checkbox" class="extra" name="trim_nose">
                Orr gyanta - 500 Ft<br>
                <input type="checkbox" class="extra" name="trim_ear">
                Fül gyanta - 800 Ft
            </div>

        </div>
        <button class="btn btn-success submit" type="submit" name="booking">Időpont foglalása</button>
    </div>

    </form>
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

