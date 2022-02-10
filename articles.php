<?php

    session_start();
    $title = "Articles";
    $css = "article";
    require ('php/include/header.inc.php');

?> 
        <main>
            <?php

                $article = new Article();

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
                    
                    $FiveArticles = $article->getAllArticle();

                    foreach ($FiveArticles as $article){
    
                        var_dump($article);

                        
                    }


                }

            ?>

        </main>

        <footer>
        <?php require('php/include/footer.inc.php'); ?>
        </footer>

    </body>

</html>