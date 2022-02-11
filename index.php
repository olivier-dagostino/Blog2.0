<?php 

    session_start();
    $title = "Accueil";
    $css = "index";
    require ('php/include/header.inc.php'); 

?>
    <main>

        <h1 id="titre-presentation">Bienvenue</h1>

        <div class="containerA">

            <div class="containerA1">

                <?php

                    $art = new Article();
                    $text = $art->getAllArticle();
                    echo "<pre>";           

                    echo "</pre>"; 
                    
                    $article = explode('/', $text['0']['article']);

                ?>

                <h2><?php echo $article[0]; ?></h2>

                <p>

                    <?php echo $article[1]; ?>

                </p>

            </div>
            <div class="containerA2">

                <?php

                    $art = new Article();
                    $text = $art->getAllArticle();
                    echo "<pre>";           
                    
                    echo "</pre>"; 
                    
                    $article = explode('/', $text['1']['article']);

                ?>

                <h2><?php echo $article[0];?></h2>

                <p>

                    <?php echo $article[1];?>

                </p>

            </div>
            <div class="containerA3">

                <?php

                    $art = new Article();
                    $text = $art->getAllArticle(); 
                    
                    $article = explode('/', $text['3']['article']);

                ?>

                <h2><?php echo $article[0]; ?></h2>

                <p>

                    <?php echo $article[1]; ?>

                </p>

            </div>

            

        </div>

    </main>


    <footer>

        <?php include('php/include/footer.inc.php') ?>

    </footer>

</body>

</html>