<?php

    session_start();

    if (!isset($_SESSION['droits'])) {
        
        header('Location: index.php');

    } else {

        $title = "Profil";
        $css = "profil";
        
        require ('php/include/header.inc.php');
    
?>

<main>

</main>

<?php require 'php/include/footer.inc.php'; } ?>