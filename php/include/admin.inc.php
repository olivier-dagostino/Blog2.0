<?php

session_start();

require('autoloader.inc.php');

$user = new User();


switch ($_POST) {

    case isset($_POST['delete_user']):

        $res1 = $user->deleteUser($value['id']);
        header('location: ../../index.php');
        break;
    
    case isset($_POST['modif_droit']);

        $user->setDroit($_POST['select-droits'], $_POST['id']);
        header('location: ../../index.php');
        break;

    case isset($_POST['modif_categorie']);

        echo "ok categorie";
        break;

    case isset($_POST['delete_article']);

        echo "ok suppressions";
        break;

}

?>