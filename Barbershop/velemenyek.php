<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/index.css">
    <link rel="stylesheet" href="Css/navbar.css">

    <link rel="stylesheet" href="Css/velemenyek.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    </style>
    <title>Barbershop | Vélemények</title>
</head>
<body id="body">
<div class="custom_scroll">
    <div id="scroll_block" class="scroll_block"></div>
</div>
<div class="egesz">
    <div style="margin: 0 0 0 auto"></div>
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
    <header><h1>Vélemények</h1></header>
    
    <div>
        <ul class="barber">
            <li>
                <input type="checkbox" name="barber" id="first" >
                <label for="first"><h2>Titán Tépőzár</h2></label>


                <div class="content">
                    <hr>
                    <div><a href="Titán-galeria.php"><button><span></span>Képek</button></a></div>
                    <h3>Titán Tépőzár értékelései:</h3>
                    <hr>
                    <div class="comment">
                        <p class="comment-author">Akika_05</p>
                        <p class="comment-text">
                            Titan Tépőzár valóban a legjobb, ami velem történhetett a borbélyszékben! A lendülete és precizitása egyszerűen lenyűgöző. Nem csupán a hajamról gondoskodott úgy, hogy az tökéletesen illeszkedjen stílusomhoz, hanem egy igazi élménnyé tette az egész folyamatot. Titan valóban méltó a nevére, mint a föld legerősebb borbélya. Nem csak a haját, de a hangulatát is feldobta!</p>
                        <p class="comment-date">2024.03.22</p>
                    </div>
                    <div class="comment">
                        <p class="comment-author">Akika_05</p>
                        <p class="comment-text">
                            Titan Tépőzár valóban a legjobb, ami velem történhetett a borbélyszékben! A lendülete és precizitása egyszerűen lenyűgöző. Nem csupán a hajamról gondoskodott úgy, hogy az tökéletesen illeszkedjen stílusomhoz, hanem egy igazi élménnyé tette az egész folyamatot. Titan valóban méltó a nevére, mint a föld legerősebb borbélya. Nem csak a haját, de a hangulatát is feldobta!</p>
                        <p class="comment-date">2024.03.22</p>
                    </div>
                    <hr>
                    <div class="felhasznalonev comment"><p class="comment-author">Akika_05</p></div>
                    <form action="">
                        <div class="velemeny">
                            <p>Vélemény:</p>
                            <textarea name="velemeny" id="velemeny_1" cols="90" rows="4" placeholder="Írd le a véleményed :) (max 256 karakter)" maxlength="256"></textarea>
                            <input type="submit" placeholder="Küldés" class="kuldes">
                        </div>

                    </form>



                </div>
            </li>
            
        </ul>
    </div>

    <div>
        <ul class="barber">
            <li>
                <input type="checkbox" name="barber" id="second">
                <label for="second"><h2>BárBár</h2></label>
                <div class="content">
                    <hr>
                    <div><a href="BárBár-galeria.php"><button><span></span>Képek</button></a></div>
                    <h3>BárBár értékelései:</h3>
                    <hr>
                    <div class="comment">
                        <p class="comment-author">Akika_05</p>
                        <p class="comment-text">
                            Titan Tépőzár valóban a legjobb, ami velem történhetett a borbélyszékben! A lendülete és precizitása egyszerűen lenyűgöző. Nem csupán a hajamról gondoskodott úgy, hogy az tökéletesen illeszkedjen stílusomhoz, hanem egy igazi élménnyé tette az egész folyamatot. Titan valóban méltó a nevére, mint a föld legerősebb borbélya. Nem csak a haját, de a hangulatát is feldobta!</p>
                        <p class="comment-date">2024.03.22</p>
                    </div>
                    <div class="comment">
                        <p class="comment-author">Akika_05</p>
                        <p class="comment-text">
                            Titan Tépőzár valóban a legjobb, ami velem történhetett a borbélyszékben! A lendülete és precizitása egyszerűen lenyűgöző. Nem csupán a hajamról gondoskodott úgy, hogy az tökéletesen illeszkedjen stílusomhoz, hanem egy igazi élménnyé tette az egész folyamatot. Titan valóban méltó a nevére, mint a föld legerősebb borbélya. Nem csak a haját, de a hangulatát is feldobta!</p>
                        <p class="comment-date">2024.03.22</p>
                    </div>
                    <hr>
                    <div class="felhasznalonev comment"><p class="comment-author">Akika_05</p></div>
                    <form action="">
                        <div class="velemeny">
                            <p>Vélemény:</p>
                            <textarea name="velemeny" id="velemeny_2" cols="90" rows="4" placeholder="Írd le a véleményed :) (max 256 karakter)" maxlength="256"></textarea>
                            <input type="submit" placeholder="Küldés" class="kuldes">
                        </div>

                    </form>
                    </div>
            </li>

        </ul>


    </div>

    <div>
        <ul class="barber">
            <li>
                <input type="checkbox" name="barber" id="third">
                <label for="third"><h2>Borzas Bertó</h2></label>
                <div class="content">
                    <hr>
                    <div><a href="Bertold-galeria.php"><button><span></span>Képek</button></a></div>
                    <h3>Borzas Bertó értékelése:</h3>
                    <hr>
                    <div class="comment">
                        <p class="comment-author">Akika_05</p>
                        <p class="comment-text">
                            Titan Tépőzár valóban a legjobb, ami velem történhetett a borbélyszékben! A lendülete és precizitása egyszerűen lenyűgöző. Nem csupán a hajamról gondoskodott úgy, hogy az tökéletesen illeszkedjen stílusomhoz, hanem egy igazi élménnyé tette az egész folyamatot. Titan valóban méltó a nevére, mint a föld legerősebb borbélya. Nem csak a haját, de a hangulatát is feldobta!</p>
                        <p class="comment-date">2024.03.22</p>
                    </div>
                    <div class="comment">
                        <p class="comment-author">Akika_05</p>
                        <p class="comment-text">
                            Titan Tépőzár valóban a legjobb, ami velem történhetett a borbélyszékben! A lendülete és precizitása egyszerűen lenyűgöző. Nem csupán a hajamról gondoskodott úgy, hogy az tökéletesen illeszkedjen stílusomhoz, hanem egy igazi élménnyé tette az egész folyamatot. Titan valóban méltó a nevére, mint a föld legerősebb borbélya. Nem csak a haját, de a hangulatát is feldobta!</p>
                        <p class="comment-date">2024.03.22</p>
                    </div>
                    <hr>
                    <div class="felhasznalonev comment"><p class="comment-author">Akika_05</p></div>
                    <form action="">
                        <div class="velemeny">
                            <p>Vélemény:</p>
                            <textarea name="velemeny" id="velemeny_3" cols="90" rows="4" placeholder="Írd le a véleményed :) (max 256 karakter)" maxlength="256"></textarea>
                            <input type="submit" placeholder="Küldés" class="kuldes">
                        </div>

                    </form>

                </div>
            </li>

        </ul>

    </div>
    <div>
        <ul class="barber">
            <li>
                <input type="checkbox" name="barber" id="fourth">
                <label for="fourth"><h2>Farkas Sándor</h2></label>
                <div class="content">
                    <hr>
                    <div><a href="Sándor-galeria.php"><button><span></span>Képek</button></a></div>
                    <h3>Farkas Sándor értékelései:</h3>
                    <hr>
                    <div class="comment">
                        <p class="comment-author">Akika_05</p>
                        <p class="comment-text">
                            Titan Tépőzár valóban a legjobb, ami velem történhetett a borbélyszékben! A lendülete és precizitása egyszerűen lenyűgöző. Nem csupán a hajamról gondoskodott úgy, hogy az tökéletesen illeszkedjen stílusomhoz, hanem egy igazi élménnyé tette az egész folyamatot. Titan valóban méltó a nevére, mint a föld legerősebb borbélya. Nem csak a haját, de a hangulatát is feldobta!</p>
                        <p class="comment-date">2024.03.22</p>
                    </div>
                    <div class="comment">
                        <p class="comment-author">Akika_05</p>
                        <p class="comment-text">
                            Titan Tépőzár valóban a legjobb, ami velem történhetett a borbélyszékben! A lendülete és precizitása egyszerűen lenyűgöző. Nem csupán a hajamról gondoskodott úgy, hogy az tökéletesen illeszkedjen stílusomhoz, hanem egy igazi élménnyé tette az egész folyamatot. Titan valóban méltó a nevére, mint a föld legerősebb borbélya. Nem csak a haját, de a hangulatát is feldobta!</p>
                        <p class="comment-date">2024.03.22</p>
                    </div>
                    <hr>
                    <div class="felhasznalonev comment"><p class="comment-author">Akika_05</p></div>
                    <form action="">
                        <div class="velemeny">
                            <p>Vélemény:</p>
                            <textarea name="velemeny" id="velemeny_4" cols="90" rows="4" placeholder="Írd le a véleményed :) (max 256 karakter)" maxlength="256"></textarea>
                            <input type="submit" placeholder="Küldés" class="kuldes">
                        </div>

                    </form>

                </div>
            </li>


        </ul>

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