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
                    
                    $articles = $article->getAllArticle();
                    

                    foreach($articles as $article){

                        $display = explode('/', $article['article']);

                        var_dump($display);

                        /* for($i = 0; isset($display[$i]); $i++){

                            echo "<p>$display[$i]</p>";

                        } */

                    }
                    die();
                    foreach ($display as $titre => $article){

                    echo "<h1>" . $titre . "</h1><p>" . $article . "</p>";

                    // echo "<article>" . $article ['article'] . "</article>";

                    }

                    


                }

            ?>

        </main>

        <footer>
        <?php require('php/include/footer.inc.php'); ?>
        </footer>

    </body>

</html>