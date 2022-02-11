<?php

    session_start();
    $title = "Articles";
    $css = "article";
    require ('php/include/header.inc.php');

    $article = new Article();

?> 
        <main>

            <?php

                if (isset($_GET["start"])){

                    if(isset($_GET["categorie"])){

                        $FiveArticles = $article->get5Article($_GET["start"], $_GET["categorie"]);
    
                        foreach ($FiveArticles as $article){
    
                            echo $key;
    
                            foreach($article as $key => $value){
                                
                                echo $value;
                            }
                        }
                    }
                    
                    else {

                        $FiveArticles = $article->get5Article($_GET["start"], '');

                        foreach ($FiveArticles as $article){
    
                            echo $key;
    
                            foreach($article as $key => $value){
                                
                                echo $value;
                            }
                        }
                    }
                    
                }

                else {
                    
                    $articles = $article->getAllArticle();

                }

            ?>

        </main>

        <footer>
        <?php require('php/include/footer.inc.php'); ?>
        </footer>

    </body>

</html>