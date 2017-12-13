
<?php

session_start();


if ((!isset($_POST['username'])) || (!isset($_POST['password'])))
{
      header('Location: stronaGlowna.php');

    exit();
}

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
        $login = $_POST['username']; echo ($login);
        $haslo = $_POST['password']; echo ($haslo);

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");



        if ($rezultat = $polaczenie->query(

            sprintf("SELECT * FROM users WHERE login='%s' AND pass='%s'",
                mysqli_real_escape_string($polaczenie,$login),
                mysqli_real_escape_string($polaczenie,$haslo))))
        {

            $ilu_userow = $rezultat->num_rows;

            if($ilu_userow>0)
            {

                $wiersz = $rezultat->fetch_assoc();

                if(password_verify($haslo, password_hash($wiersz['pass'], PASSWORD_DEFAULT)))
                {

                    $_SESSION['zalogowany'] = true;


                    $_SESSION['id'] = $wiersz['id'];
                    $_SESSION['login'] = $wiersz['login'];
                    $_SESSION['pass'] = $wiersz['pass'];
                    $_SESSION['email'] = $wiersz['email'];

                    unset($_SESSION['error']);


                    $rezultat->free_result();

                    header('Location: glownaZalogowana.php');
                }
                else
                {

                    $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';

                    header('Location: stronaGlowna.php');
                }

            }
            else
            {

                $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';

                header('Location: stronaGlowna.php');

            }
        }
        else
        {
            echo "error!";
            throw new Exception($polaczenie->error);
        }

        //zamkniecie połączenia
        $polaczenie->close();

    }
}
catch(Exception $e)
{
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o wizytę w innym terminie!</span>';
    echo '<br />Informacja developerska: '.$e;
}

?>