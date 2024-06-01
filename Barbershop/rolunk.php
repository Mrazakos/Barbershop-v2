<!doctype html>
<html lang="hu">
<head>
    <link rel="icon" href="kepek/ollo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/index.css">
    <link rel="stylesheet" href="Css/navbar.css">
    <link rel="stylesheet" href="Scrollbar/scrollbar.css">
    <link rel="stylesheet" href="Css/rolunk.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
    </style>
    <title>Barbershop | Rólunk</title>
</head>
<body id="body">
<div class="custom_scroll">
    <div id="scroll_block" class="scroll_block"></div>
</div>

<div class="egesz">
    <div style="margin: 0 0 0 auto">
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
    <header>
        <h1>Rólunk</h1>
    </header>
    <div class="content">

        <section>
            <h2>Az üzletről:</h2>
            <p>A Szegeden újonnan megnyílt barbershop egy modern, stílusos helyszín, amely a klasszikus és kortárs stílusokat ötvözi.
                <br>A helyszín kifinomult berendezése és barátságos légköre ideális választás mindazoknak, akik minőségi fodrászati és borotválkozási szolgáltatásokra vágynak.</p>
            <h2>Nyitvatartás:</h2>
            <ul>
                <li>
                    Hétfő-Péntek: 9-19


                </li>
                <li>
                    Szombat: 10-18


                </li>
                <li>
                    Vasárnap:

                    Zárva
                </li>
            </ul>
            <h2>Elérhetőség:</h2>
            <p class="elerhetosegek">Szeged, Ady tér 10.<br>
            Tel: 06 30 555 5555 <br>
            E-mail:Barberbareber@valami.u-szeged.hu</p>
        </section>
        <div class="vonal" style="height: 400px;"></div>
        <div class="terkep">
            <h2>Elhelyezkedés:</h2>
            <aside>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5518.314964640698!2d20.142543000000003!3d46.247097!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4744887a89db9c17%3A0x41b259fd93867ce2!2sSzeged%2C%20Ady%20t%C3%A9r%2010%2C%206722!5e0!3m2!1sen!2shu!4v1710875635487!5m2!1sen!2shu" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </aside>
        </div>
    </div>
</div>

        <div class="paratlan barber">
            <div class="kep"><img src="kepek/varazs.webp" alt=""></div>
            <div class="vonal"></div>
            <section class="leiras">
                <h2>A Varázsborbély!</h2>
                Bemutatnám Önnek Farkas Sándort, a Varázsborbélyt!<br>
                Farkas mester nem csupán egy átlagos fodrász, hanem varázslatos képességekkel rendelkezik, amelyek segítségével hajviseleteket alkot, amik igazán különlegessé varázsolják viselőjüket.
                <br> Ő nem csupán a haját formázza, hanem a szívét is érinti varázslatos érintésével. <br>
                Legyen részese az átalakulásnak Farkas Sándor mester kezei alatt!</section>
        </div>
        <div class="paros barber">
            <div class="kep"><img src="kepek/Titán-Tépőzár.jpg" alt=""></div>
            <div class="vonal"></div>
            <section>
                <h2>Titán Tépőzár</h2>
                <p>
                    Titan Tépőzár, a föld legerősebb borbélya!<br>
                    Titan nem csupán egy átlagos borbély, hanem egy igazi hajhős, akinek kezei mögött a legkeményebb férfiak és nők hajzuhatagai formálódnak újra.
                </p>
                   <p> Titan nem csak a hajvágásban és borotválkozásban jeleskedik, hanem híres a vasakarata és szilárdsága miatt is. Minden egyes mozdulata határozott és precíz, ahogy az egy igazi bajnokhoz illik. Ahogy a föld legnagyobb hegymászói az óriások csúcsait hódítják meg, úgy uralja Titan is a borotválkozás művészetét.</p>
            </section>
        </div>
        <div class="paratlan barber">
            <div class="kep"><img src="kepek/Borzas.webp" alt=""></div>
            <div class="vonal"></div>
            <section>
                <h2>Borzas Bertó</h2>
                <p>
                    Borbély Bertalan, vagy ahogy sokan becézik, "Borzas Bertó", Szeged egyik legjelentéktelenebb borbélya. A félhomályos, kopottas kis "Borotva Bácskája" elhagyottan áll a város peremén. Bertó túl lassú, félénk és hajlamos elfelejteni az alapvető fodrászati technikákat. Az emberek inkább mosdatlanul és szőrösen járnak, minthogy beüljenek hozzá egy frizurára vagy borotválkozásra. A nyitvatartás sem mindig megbízható, és ha mégis felbukkan, akkor is a legtöbben inkább elkerülik a szerencsétlenül járt hajvágást és botladozó borotválást, amihez kétségbeesetten próbál ragaszkodni. Borzas Bertó borbélysága talán a világ legjobb példája annak, hogy minden mesterségben vannak mélypontok.
                </p>
            </section>
        </div>
        <div class="paros barber">
            <div class="kep"><img src="kepek/BárBár.webp" alt=""></div>
            <div class="vonal"></div>
            <section>
                <h2>BárBár</h2>
                <p> Bárbár, a legújabb generációs AI vezérelt borbélyrobot. Bárbár nem csupán egy szokványos robot, hanem a legfejlettebb mesterséges intelligencia felhasználásával kifejlesztett, hogy tökéletes frizurákat és borotválkozást biztosítson minden vendég számára. Bárbár képes elemző algoritmusok segítségével azonnal felismerni és alkalmazkodni az egyedi igényekhez és stílushoz.</p>

            </section>
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