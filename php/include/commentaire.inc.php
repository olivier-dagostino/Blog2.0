<?php

session_start();

require('autoloader.inc.php');

if (isset($_POST['submit'])) {

    if (empty($_POST['titre']) || empty($_POST['commentaire'])) {

        echo "<p>Veuillez remplir tout les champs</p>";

    } else {

        $commentaire = new Commentaire();

        $commentaire->insertCommentaire($_POST['titre'], $_POST['commentaire'], $_SESSION['id'], $_POST['id_article']);

        echo "<p>Votre commentaire est bien enregistré</p>";

        header("Refresh:2, URL=../../article.php?id=" . $_POST["id_article"]);

    }
}                

