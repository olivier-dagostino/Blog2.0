<?php 

    session_start();
    $title = "Accueil";
    $css = "index";
    require ('php/include/header.inc.php'); 

    $article = new Article();
    
?>
    <main>

<?php

$text = $article->getArticles(3,'');

?>
    </main>


    <footer>

        <?php include('php/include/footer.inc.php') ?>

    </footer>

</body>

</html>