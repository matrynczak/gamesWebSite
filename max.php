<?php
session_start();

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Moje ulubione gry" />
        <title>Projekt zaliczeniowy o grach</title>
        <link rel="stylesheet" href="styles/sites.css" type="text/css" />
    </head>
<body background="images/background.jpg">
<div class="container">
    <header id="header">
        <?php
        if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)){
            echo '<a href="glownaZalogowana.php"><div id="logo"></div></a>';
        }
        else {
            echo '<a href="stronaGlowna.php"><div id="logo"></div></a>';
        }
        ?>
        <div id="registry-button"><a href="registry.php"><input type="submit" value="Zarejestruj się!"></a></div>
        <div id="login-form">
            <?php
            if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)){
                echo '<a href="logout.php"><button class="logout">Wyloguj sie</button></a>';
                echo "<p class='logged_message'>Witaj, ".$_SESSION['login']."</p>";
            }
            else {
                echo '<form action="login.php"  method="POST">';
                echo '<div id="login-button"><input type="submit" value="Zaloguj!"></div>';
                echo '<div id="password-input" >Hasło: <input type="password" name="haslo"><br></div>';
                echo '<div id="username-input">Nazwa użytkownika: <input type="text" name="username"><br></div>';
                echo '</form>';
            }
            ?>
        </div>
    </header>
    <div class="main-content">
    <div class="game-logo"><img src="max/max.png"/></div>
    <div class="game-description"><p>Max Payne to wydana na platformie PC Windows trzecioosobowa gra akcji w konwencji thrillera. Za stworzenie tytułu odpowiedzialne jest pochodzące z Finlandii studio Remedy Entertainment, znane wcześniej głównie za sprawą zręcznościowej gry wyścigowej Death Rally z 1996 roku. Pierwotna wersja gry zadebiutowała w roku 2001 na komputerach PC i konsolach szóstej generacji, zaś dwa lata później za sprawą studia Mobius Entertainment doczekała się mocno uproszczonej konwersji na przenośną konsolkę Game Boy Advance. Jedenaście lat po premierze oryginału, przygotowany przez ekipę studia War Drum Max Payne Mobile trafił na popularne urządzenia mobilne, oferując odświeżoną oprawę graficzną, podrasowaną do standardów HD.
      kazana w formie retrospekcji fabuła Maksa Payne’a koncentruje się wokół postaci tytułowego nowojorskiego policjanta, prowadzącego prywatne śledztwo w sprawie brutalnego morderstwa swojej żony i córki, dokonanego przez bandytów będących pod wpływem tajemniczego narkotyku Valkiria. Sytuacja Maksa dramatycznie komplikuje się w momencie, gdy zostaje wrobiony w zabójstwo swego przyjaciela – agenta DEA, co skupia na nim uwagę całej nowojorskiej policji, na czele z komisarzem Jimem Bravurą.
      Źródło: http://www.gry-online.pl/S016.asp?ID=154</p></div>
    <div class="grid">
        <div class="row-1">
            <div class="col-1">
            <div class="image"><img src="max/max1.png"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="max/max2.jpg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="max/max3.jpg"/></div>
            </div>
        </div>
        <div class="row-2">
            <div class="col-1">
            <div class="image"><img src="max/max4.jpeg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="max/max5.jpg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="max/max6.jpeg"/></div>
            </div>
        </div>
             <div class="row-3">
            <div class="col-1">
            <div class="image"><img src="max/max7.jpeg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="max/max8.jpeg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="max/max9.jpg"/></div>
            </div>
        </div>
    </div>
    </div>



</body>
    <footer class="footer">
    <div class="note"> Powyższa strona internetowa powstała na potrzeby zaliczenia z przedmiotu "Internet i jego zastosowanie." </div>
    <div class="copyright">Autor: Mateusz Rynczak</div>

</footer>
</html>
