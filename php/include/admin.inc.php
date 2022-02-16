<?php

session_start();

require('autoloader.inc.php');

$user = new User();
$cat = new Categorie();
$article = new Article();

switch ($_POST) {

    case isset($_POST['delete_user']):

        $res1 = $user->deleteUser($value['id']);
        header('location: ../../index.php');
        break;
    
    case isset($_POST['modif_droit']);

        $user->setDroit($_POST['select-droits'], $_POST['id']);
        header('location: ../../admin.php');
        break;

    case isset($_POST['modif_categorie']);
        
        $article->setCategorie($_POST['id_categorie'], $_POST['id_article']);
        echo "ok categorie";
        header(('location: ../../admin.php'));
        break;

    case isset($_POST['delete_article']);

        echo "ok suppressions";
        header(('location: ../../admin.php'));
        break;

}

?>