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
    <div class="game-logo"><img src="pes06/pes.png"/></div>
    <div class="game-description"><p>Pro Evolution Soccer 6 to kolejna część doskonałej symulacji piłki nożnej, za którą odpowiedzialni są programiści z tokijskiego oddziału Konami (w Kraju Kwitnącej Wiśni gra znana jest pod nazwą Winning Eleven 10). W porównaniu do poprzedniego wydania doszło do kilku zmian zarówno pod względem możliwości oraz sposobu rozgrywania meczów, jak i ilości oryginalnych teamów na murawie. Wraz z tą edycją pojawiły się nowe, licencjonowane zespoły narodowe m.in. Holandia, Anglia, Hiszpania, Trynidad i Tobago oraz klubowe takie, jak Bayern Monachium, Manchester United. Po raz pierwszy dodano tryb International Challenge (odpowiednik Mistrzostw Świata), dzięki któremu można zdobyć najcenniejsze piłkarskie trofeum ze swoja ulubioną reprezentacją. Największe emocje sprawia gra wieloosobowa. W domu można zmierzyć się z maksymalnie ośmioma graczami, natomiast w Internecie czterema. Ta ostatnia opcja została bardziej dopracowana, przez co gra na serwerach wiąże się z mniejszymi opóźnieniami. Dodatkowo Konami nie zapomniało systemach rankingowych i turniejach organizowanych w sieci.
      Źródło: http://www.gry-online.pl/S016.asp?ID=7345</p></div>
    <div class="grid">
        <div class="row-1">
            <div class="col-1">
            <div class="image"><img src="pes06/pes1.jpg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="pes06/pes2.webp"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="pes06/pes3.webp"/></div>
            </div>
        </div>
        <div class="row-2">
            <div class="col-1">
            <div class="image"><img src="pes06/pes4.jpg"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="pes06/pes5.jpeg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="pes06/pes6.jpeg"/></div>
            </div>
        </div>
             <div class="row-3">
            <div class="col-1">
            <div class="image"><img src="pes06/pes7.webp"/></div>
            </div>
            <div class="col-2">
            <div class="image"><img src="pes06/pes8.jpeg"/></div>
            </div>
            <div class="col-3">
            <div class="image"><img src="pes06/pes9.jpg"/></div>
            </div>
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
