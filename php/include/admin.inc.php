<?php

session_start();

require('autoloader.inc.php');

switch ($_POST) {

    case isset($_POST['delete']):
        var_dump($_POST);
        $info = new User();
        $res1 = $info->deleteUser($value['id']);
        echo 'Votre Compte à bien été supprimé';
        session_unset();
        header('location: ../../index.php');
        break;
    
    case isset($_POST['submit']);

        $user = new User();
        $user->setDroit($_POST['select-droits'], $_POST['id']);
        header('location: ../../index.php');
        break;

}

?>