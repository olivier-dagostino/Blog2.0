<?php

session_start();

require('autoloader.inc.php');



if ($_POST['submit'] !== null) {
    
    $user = new User();

    $user->setDroit($_POST['select-droits'], $_SESSION['id']);
}
?>