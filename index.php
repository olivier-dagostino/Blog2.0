<?php 

    session_start();
    $title = "Accueil";
    $css = "index";
    require ('php/include/header.inc.php'); 

    $article = new Article();
    
?>
    <main>

<?php

    $text = $article->getIndexArticles();

?>

    </main>




        <?php include('php/include/footer.inc.php') ?>

  

</body>

</html>