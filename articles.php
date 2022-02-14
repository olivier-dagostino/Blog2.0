<?php

    session_start();
    $title = "Articles";
    $css = "article";
    require ('php/include/header.inc.php');

    $article = new Article();

?>

<main>

    <h1>Les Articles</h1>
    
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

            $currentPage = 1;

            if(isset($_GET['categorie']) && !empty($_GET['categorie'])){
                
                $articles= $article->getArticles(5, 0, $_GET['categorie']);
    
                }else{
        
                    $articles= $article->getArticles(5, 0);
    
                }    

        }

    ?>

<nav id="select-page">
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="articles.php?start= <?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>

        <?php $pages = $article->totalPages(); for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="articles.php?start=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>

            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="articles.php?start=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>


</main>

<?php require('php/include/footer.inc.php'); ?>

