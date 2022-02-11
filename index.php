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

        <div class="containerA1">

            <?php        
                // $article = explode('/', $text['0']['article']);

            ?>

            <h2><?php echo $article[0]; ?></h2>

            <p>

                <?php echo $article[1]; ?>

            </p>

        </div>
        
    </main>


    <footer>

        <?php include('php/include/footer.inc.php') ?>

    </footer>

</body>

</html>