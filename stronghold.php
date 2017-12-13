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
    <div class="game-logo"><img src="stronghold/str.png"/></div>
    <div class="game-description"><p>Twierdza to połączenie symulatora budowy średniowiecznych zamczysk i strategii ekonomicznej polegającej na zarządzaniu miastem. Akcja gry osadzona została w średniowiecznej Europie, a gracze mogą: zakładać nowe osady, rozwijać je, budować potężne twierdze oraz toczyć zajadłe batalie z udziałem dziesiątek różnorodnych wojsk. Nasze zamczyska możemy dowolnie projektować i konstruować z szeregu gotowych elementów (wieże, zwodzone mosty, tajemne wejścia, wilcze doły, balisty, kilka rodzajów muru itp.), tak by jak najlepiej pełniły funkcje obronne i nawet podczas oblężenia życie w mieście toczyło się normalnym tokiem. Podobnie tworzymy infrastrukturę ekonomiczną i gospodarczą osady - budując: domy mieszkalne, siedziby drwali, targ, farmy itp., czyli budynki, które zapewnią naszym poddanym pracę, jadło i pieniądze. Jednym z istotniejszych i zarazem widowiskowych elementów gry są walki. Szczególnie atrakcyjne są oblężenia zamków, w nich ścierają się różne jednostki, w tym specjalne jak: inżynierowie, saperzy wykonujący podkopy, żołnierze szturmujący mury z drabinami oraz mobilnym sprzętem (wieże oblężnicze, tarany, przenośne tarcze, balisty i katapulty).
Źródło: http://www.gry-online.pl/S016.asp?ID=706</p></div>
    <div class="grid">
        <div class="row-1">
            <div class="col-1">
            <div class="image"><img src="stronghold/strong.jpeg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="stronghold/str2.jpeg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="stronghold/str3.jpeg"/></div>
            </div>
        </div>
        <div class="row-2">
            <div class="col-1">
            <div class="image"><img src="stronghold/str4.jpeg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="stronghold/str5.jpeg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="stronghold/str6.jpeg"/></div>
            </div>
        </div>
             <div class="row-3">
            <div class="col-1">
            <div class="image"><img src="stronghold/str7.jpeg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="stronghold/str8.jpeg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="stronghold/str9.jpeg"/></div>
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
