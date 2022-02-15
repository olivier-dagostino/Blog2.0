<?php

    session_start();
    $title = "Article";
    $css = "article";
    require ('php/include/header.inc.php');
    
    $article = new Article();

    $commentaire = new Commentaire();
    
    ?>

<main>
    
    <?php
            
        if (isset($_GET['id']) && !empty($_GET['id'])){
        
            $article = $article->getArticleById($_GET['id']);
            
            $commentaires = $commentaire->getCommentaires($_GET['id']);
                    
        } else {
        
            header('location: articles.php');
        
        }

        if(isset($_SESSION["id"])) : 

    ?>
                            
        <form action="php/include/commentaire.inc.php"  method="POST">

            <fieldset>

                <legend>Ajouter un commentaire</legend>

                <input type="text" name="id_article" value="<?= $_GET['id'] ?>" hidden>

                <label for="titre">Titre du commentaire</label>
                <input name="titre" type="text" placeholder="Titre du commentaire">

                <label for="comm">Votre Commentaire</label>

                <textarea id="comm" name="commentaire" placeholder="Votre commentaire" rows="10" cols="40"></textarea>

                <input type="submit" name="submit" value="Envoyer">

            </fieldset>

        </form>

        <?php endif ?>
        
    </main>
    
    <?php require('php/include/footer.inc.php') ?>