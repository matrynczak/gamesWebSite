/**
 * Created by PhpStorm.
 * User: mateusz
 * Date: 22.11.17
 * Time: 21:08
 */

<?php

session_start();

session_unset();

header('Location: stronaGlowna.php');

?>