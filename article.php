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
            
                $id = $_GET['id'];
            
            } else {
            
                header('location: articles.php');
            
            }
            
            for ($i = 0; isset($com[$i]); $i++) {

                $commentaire = explode('/', $com[$i]['commentaire']);
                echo "<div class='box4'>";
                echo "<div class='infos2'>";
                echo "<p>Titre: $commentaire[0]</p>";

                if ($com[$i]['active'] == 0) {

                    echo '<p>Ecrit par ' . $com[$i]['login'] . '</p>';
                    $date = strtotime($com[$i]['date']);
                    echo '<p> le ' . date('d/m/Y', $date) . '</p>';

                } else {

                    $date = strtotime($com[$i]['date']);
                    echo '<p>Ecrit par Utilisateur</p>';
                    echo '<p> le ' . date('d/m/Y', $date) . '</p>';
                }

                echo "</div>";
                echo "<p class='commentaire'>$commentaire[1]</p>";
                echo "</div>";
            }

            if (isset($_SESSION['id'])) :

        ?>
                            
                <form action="assets/php/include/commentaire.inc.php"  method="POST">

                <fieldset>

                    <legend>Ajouter un commentaire</legend>

                    <label for="comm">Votre Commentaire</label>

                    <textarea id="comm" name="commentaire" placeholder="Votre commentaire" rows="10" cols="40"></textarea>

                    <input type="submit" name="submit" value="Envoyer">

                </fieldset>

                </form>

        <?php

            endif;

        ?>
        
    </main>
    
    <?php require('php/include/footer.inc.php') ?>