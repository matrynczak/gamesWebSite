
<?php

	session_start();
	
		if (isset($_POST['email']))

		$wszystko_OK=true;
		

		$nick = $_POST['nick'];


		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			//zmiana flagi na false
			$wszystko_OK=false;
			
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}

		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}

		$email = $_POST['email'];
		

 		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		//sprawdzamy ich dlugosci
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	


		$sekret = "6LfdRzgUAAAAAKY_pE9F1suvKzIO9bZyMIBq--iW";
		

		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		

		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}		
		
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		//wkelj plik connect.php
		require_once "connect.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{

				$rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				
				$ile_takich_maili = $rezultat->num_rows;
				
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				$rezultat = $polaczenie->query("SELECT id FROM users WHERE login='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				
				
				if ($wszystko_OK==true)
				{

                    $id_new = rand (10, 9999999);

					if ($polaczenie->query("INSERT INTO users VALUES ('$id_new', '$nick', '$haslo1', '$email')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: welcomePage.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			//nieudana próba polaczenia z serverem
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;


	}
	
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Załóż darmowe konto!</title>
	
	<link rel="stylesheet" href="styles/registry.css" type="text/css"/>
	
	<!--js do recaptcha--> 
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>

<body  background="images/background.jpg">
	
	
	<div class="container_rejestracja">
	
		<span class="rejestr">FORMULARZ REJESTRACJI!</span>
	

		<form method="post">
		
			Nickname: <br /> <input type="text" value="<?php
				if (isset($_SESSION['fr_nick']))
				{
					echo $_SESSION['fr_nick'];
					unset($_SESSION['fr_nick']);
				}
			?>" name="nick" /><br /><br />
			
			
			<?php
				if (isset($_SESSION['e_nick']))
				{
					echo '<div class="error" style="color: red; margin-top: 5px; margin-bottom: 15px;">'.$_SESSION['e_nick'].'</div>';
					
					unset($_SESSION['e_nick']);
				}
			?>
			

			
			E-mail: <br /> <input type="text" value="<?php
				if (isset($_SESSION['fr_email']))
				{
					echo $_SESSION['fr_email'];
					unset($_SESSION['fr_email']);
				}
			?>" name="email" /><br /><br />
			
			<?php
				if (isset($_SESSION['e_email']))
				{
					//wyswietlamy blad o emailu
					echo '<div class="error" style="color: red; margin-top: 5px; margin-bottom: 15px;">'.$_SESSION['e_email'].'</div>';
					
					//usuwamy zmienna sesyjna
					unset($_SESSION['e_email']);
				}
			?>
			
			Twoje hasło: <br /> <input type="password"  value="<?php
				if (isset($_SESSION['fr_haslo1']))
				{
					echo $_SESSION['fr_haslo1'];
					unset($_SESSION['fr_haslo1']);
				}
			?>" name="haslo1" /><br /><br />
			
			
			<?php
				if (isset($_SESSION['e_haslo']))
				{
					//wyswietlamy blad hasla
					echo '<div class="error" style="color: red; margin-top: 5px; margin-bottom: 15px;">'.$_SESSION['e_haslo'].'</div>';
					
					//usuwamy zmienna sesyjna
					unset($_SESSION['e_haslo']);
				}
			?>		
			
			Powtórz hasło: <br /> <input type="password" value="<?php
				if (isset($_SESSION['fr_haslo2']))
				{
					echo $_SESSION['fr_haslo2'];
					unset($_SESSION['fr_haslo2']);
				}
			?>" name="haslo2" /><br /><br />
			
 <?php
					?>/> Akceptuję regulamin
			</label>-->
			
			<?php
				if (isset($_SESSION['e_regulamin']))
				{
					echo '<div class="error" style="color: red; margin-top: 5px; margin-bottom: 15px;">'.$_SESSION['e_regulamin'].'</div>';
					unset($_SESSION['e_regulamin']);
				}
			?>	
			
			<div class="g-recaptcha" data-sitekey="6LfdRzgUAAAAAJ5PsWjquyLCw_cXBbJpEocImfnJ"></div>
			
			<?php
				if (isset($_SESSION['e_bot']))
				{
					echo '<div class="error" style="color: red; margin-top: 5px; margin-bottom: 15px;">'.$_SESSION['e_bot'].'</div>';
					unset($_SESSION['e_bot']);
				}
			?>	
			
			<br />
			<div class="registry-button">
			<input type="submit" value="Zarejestruj się" />
            </div>
		</form>
	</div><!--container-->
</body>
</html>