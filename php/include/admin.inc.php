<?php

session_start();

require('autoloader.inc.php');

$user = new User();
$article = new Article();
$categorie = new Categorie();

switch ($_POST) {

    // Suppression d'utilisateur
    case isset($_POST['delete_user']):

        // Vérification que l'utilisateur en question n'est pas l'admin connecté
        if ($_POST['id'] != $_SESSION['id']) {
            
            $res1 = $user->deleteUser($_POST['id']);
            header('location: ../../admin.php');

        } else {

            $_SESSION['error'] = "Vous ne pouvez pas supprimer votre compte";
            header('location: ../../admin.php');
            break;
        }
        
        break;
    
    // Modification des droits d'un utilisateur
    case isset($_POST['modif_droit']);

        // Vérification que l'utilisateur en question n'est pas l'admin connecté
        if ($_POST['id'] != $_SESSION['id']) {

            $user->setDroit($_POST['select-droits'], $_POST['id']);
            header('location: ../../index.php');
            
        } else {

            $_SESSION['error'] = "Vous ne pouvez pas modifier vos droits";
            header('location: ../../admin.php');
            break;
        }

        break;

    // Modification de la catégorie d'un article
    case isset($_POST['modif_categorie']);
        
        $article->setCategorie($_POST['id_categorie'], $_POST['id_article']);
        $_SESSION['success'] = "Modification réussie";
        header(('location: ../../admin.php'));
        break;

    // Suppression d'un article
    case isset($_POST['delete_article']);

    $article->deleteArticle($_POST['id_article']);
    $_SESSION['success'] = "Article supprimé";
    header(('location: ../../admin.php'));
    break;

}

?>