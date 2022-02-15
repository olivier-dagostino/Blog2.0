<?php

session_start();

require('autoloader.inc.php');

if (isset($_POST['submit'])) {

    if (empty($_POST['titre']) || empty($_POST['corp'])) {

        echo "<p>Veuillez remplir tout les champs</p>";

    } else {

        $corp = $_POST['titre'] . '/' . $_POST['corp'];
        $comm->insertcom($corp, $_GET['id'], $_SESSION['id']);
        echo "<p>Votre commentaire est bien enregistré</p>";
        header("Refresh:2, URL=article.php?id=$id");

    }
}                

