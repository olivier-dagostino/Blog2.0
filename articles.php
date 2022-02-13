<?php

    session_start();
    $title = "Articles";
    $css = "article";
    require ('php/include/header.inc.php');

    $article = new Article();

?>

<main>
    
    <?php

        // On détermine sur quelle page on se trouve
        if(isset($_GET['start']) && !empty($_GET['start'])){

            $currentPage = (int) strip_tags($_GET['start']);

            if(isset($_GET['categorie']) && !empty($_GET['categorie'])){
            
            // Calcul du 1er article de la page
            $start = $currentPage * 5 - 5;

            $articles= $article->getArticles(5, $start, $_GET['categorie']);

            }else{

                $currentPage = (int) strip_tags($_GET['start']);

                $start = $currentPage * 5 - 5;

                $articles= $article->getArticles(5, $start, '');

            }

        }else{

            if(isset($_GET['categorie']) && !empty($_GET['categorie'])){
                
                $articles= $article->getArticles(5, 0, $_GET['categorie']);
    
                }else{
        
                    $articles= $article->getArticles(5, 0);
    
                }    

        }

    ?>

</main>

<?php require('php/include/footer.inc.php'); ?>

