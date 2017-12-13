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
    <div class="game-logo"><img src="fifa2006/title.png"/></div>
    <div class="game-description"><p>Fifa 06 jest kolejnym odcinkiem tasiemcowego serialu prezentującego zmagania wirtualnych piłkarzy, przygotowywanego corocznie przez kanadyjski oddział firmy Electronic Arts, ukrywający się pod nazwą EA Sports. Odpowiada on również za inne sportowe serie wydawane przez giganta EA – m.in. NBA, NHL, czy chociażby NCAA Football. Nieznaczne przeobrażenie tytułu pociągnęło za sobą wiele zmian w systemie gry, jak i we wszelkich aspektach statystycznych. W odsłonie 06 programiści EA Sports postarali się o jeszcze dokładniejsze odzwierciedlenie warunków spotykanych dotąd jedynie na prawdziwych stadionach piłkarskich. Przyniosło to ulepszenia w dziedzinie animacji zawodników oraz sędziów, a także w kwestii przedstawienia warunków atmosferycznych – od tej pory ulewa wygląda jak prawdziwe oberwanie chmury, a opady śniegu przyprawiają nas o gęsią skórkę wynikającą z obniżenia temperatury. Do naszej dyspozycji oddano ponad 19 w pełni licencjonowanych lig z całego świata, ponad 50 drużyn narodowych, a ilość piłkarzy, których możemy ujrzeć na boisku (oczywiście nie jednocześnie) oscyluje wokół liczby 15.000. W celu poprawienia jakości gry, firma EA Sports sprowadziła z Europy 70 ekspertów w dziedzinie piłki nożnej.
Źródło: http://www.gry-online.pl/S016.asp?ID=5460</p></div>
    <div class="grid">
        <div class="row-1">
            <div class="col-1">
            <div class="image"><img src="fifa2006/fifa1.jpg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="fifa2006/fifa2.png"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="fifa2006/fifa3.jpeg"/></div>
            </div>
        </div>
        <div class="row-2">
            <div class="col-1">
            <div class="image"><img src="fifa2006/fifa4.jpeg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="fifa2006/fifa5.jpeg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="fifa2006/fifa6.jpeg"/></div>
            </div>
        </div>
             <div class="row-3">
            <div class="col-1">
            <div class="image"><img src="fifa2006/fifa7.jpeg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="fifa2006/fifa8.jpg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="fifa2006/fifa9.jpg"/></div>
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
