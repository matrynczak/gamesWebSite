<?php

session_start();

    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true))
	{

		header('Location: glownaZalogowana.php');

		exit();
	}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Moje ulubione gry" />
        <title>Projekt zaliczeniowy o grach</title>
        <link rel="stylesheet" href="styles/stronaGlowna.css" type="text/css" />
    </head>
<body background="images/background.jpg">
<div class="container">
    <header id="header">
           <a href="stronaGlowna.php"><div id="logo"></div></a>'
        <div id="registry-button"><a href="registry.php"><input type="submit" value="Zarejestruj się!"></a></div>
        <div id="login-form">
            <form action="login.php" method="POST">

            <div id="login-button"><input type="submit" value="Zaloguj!"></div>
            <div id="password-input">Hasło: <input type="password" name="password"><br></div>
            <div id="username-input">Nazwa użytkownika: <input type="text" name="username"><br></div>
            </form>
        </div>
    </header>
    <?php
							if(isset($_SESSION['error']))
							{
								echo $_SESSION['error'];
							}
						?>
    <div class="main-content">
    <div class="text"><p><strong>Niniejsza strona przedstawia ulubione gry autora, z okresu kiedy to autor miał jeszcze czas na granie :) </strong>Mowa tutaj o czasach kiedy konsole PlayStation czy GameBox posiadali nieliczni. </p> Jako, że Mateusz jest od zawsze kibicem piłki nożnej, nie mogło w zestawieniu zabraknąć dwóch czołowych przedstawicieli tego gatunku gier komputerowych - FIFA oraz PRO EVOLUTION SOCCER. Wersje, w które grałem najczęśćiej to FIFA 2006 oraz PES 6. 
    
    <p>Kolejne gry wybrane do przedstawienia to jedna z gatunku gier akcji - Max Payne, część 1. Gra od samego początku wciągała swoją fabułą, wywołując u graczy nieodpartą chęć odkrycia końcowego scenariusza. Nie oparł się temu również autor strony, co skutkowało wielogodzinnym przesiadywaniem przed monitorem...</p>
    Ostatnia wspomniana gra to przedstawiciel gatunku gier strategicznych - legendarna Twierdza (Stronghold). Akcja rozgrywa się w czasach średniowiecza. Zadaniem gracza jest zbudowanie jak najsilniejszej osady, a potem miasta, a następnie podbijanie okolicznych terenów.
    
    <p>Po prawej znajdziecie filmy prezentujące najlepsze momenty lub wstęp do wybranych gier. Po otwarciu odnośników zostaniecie przeniesieni do bardziej szczegółowych opisów poszczególnych gier. </p>
    <strong>ENJOY YOURSELF!</strong>
</div>
    <div class="grid">
        <div class="row-1">
            <div class="col-1"> 
                <a href="fifa.php" class="game-name">FIFA 2006</a>
                <div class="movie"><div class="movie-inactive"><p>Tylko zalogowani użytkownicy mają dostęp do filmów.</p></div></div>
            </div>
            <div class="col-2"> 
            <a href="pes.php" class="game-name">PRO EVOLUTION SOCCER 6</a>
            <div class="movie"><div class="movie-inactive"><p>Tylko zalogowani użytkownicy mają dostęp do filmów.</p></div></div>
            </div>
        </div>
        <div class="row-2">
            <div class="col-1"> 
            <a href="max.php" class="game-name">MAX PAYNE 1</a>
            <div class="movie"><div class="movie-inactive"><p>Tylko zalogowani użytkownicy mają dostęp do filmów.</p></div></div>
            </div>
            <div class="col-2"> 
            <a href="stronghold.php" class="game-name">TWIERDZA</a>
            <div class="movie"><div class="movie-inactive"><p>Tylko zalogowani użytkownicy mają dostęp do filmów.</p></div></div>
            </div>
        </div>
    </div>
    </div>
    <div class="contact-form">
            <form >
            <div id="survey-submit-button"><input type="submit" value="Wyślij!"></div>
                <div class="survey-field">A Ty przy której z tych gier spędziłeś najwięcej czasu?</div>
                <div class="radios">
                <input type="radio" name="game" value="fifa"> Fifa 2006<br>
                <input type="radio" name="game" value="pes"> Pro Evo 6<br>
                <input type="radio" name="game" value="max-payne"> Max Payne<br>
                <input type="radio" name="game" value="stronhold"> Twierdza<br>
                </div>
            </form>
    </div>
</body>
<footer class="footer">
    <div class="note"> Powyższa strona internetowa powstała na potrzeby zaliczenia z przedmiotu "Internet i jego zastosowanie." </div>
    <div class="copyright">Autor: Mateusz Rynczak</div>
</footer>
</div>

</html>