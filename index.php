<?php 

    session_start();
    $title = "Accueil";
    $css = "index";
    require ('php/include/header.inc.php'); 

    $article = new Article();
    $text = $article->getIndexArticles();
?>
    <main>

        <h1 id="titre-presentation">Bienvenue</h1>

        
        
    </main>


    <footer>

        <?php include('php/include/footer.inc.php') ?>

    </footer>

</body>

</html>