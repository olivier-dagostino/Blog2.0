<?php

    session_start();
    $title = "Article";
    $css = "article";
    require ('php/include/header.inc.php');
    // require('php/include/autoloader.inc.php');

?>
    <main>

        <?php

            $art = new Article();
            $text = $art->getAllArticle();
            // echo "<pre>";           
            // var_dump($text);
            // echo "</pre>"; 
            
            $article = explode('/', $text);
                      
            // $comm = new Commentaire();
            // $com = $comm->getComAndUserById($_GET['id']);
            // $id = $_GET['id'];

            if (isset($_POST['submit'])) {

                if (empty($_POST['titre']) || empty($_POST['corp'])) {

                    echo "<p>Veuillez remplir tout les champs</p>";

                } else {

                    $corp = $_POST['titre'] . '/' . $_POST['corp'];
                    $comm->insertcom($corp, $_GET['id'], $_SESSION['id']);
                    echo "<p>Votre commentaire est bien enregistré</p>";
                    header("Refresh:2, URL=article.php?id=$id");

                }
            }
        ?>
        <div class="containerA">

            <div class="containerB">

                <div class="containerC">

                    <div class="containerC1">

                        <h1 class="titre"><?php echo $article[0]; ?></h1>
                        <p class="article"><?php echo $article[1]; ?></p>

                    </div>

                    <div class="containerC2">

                        <p>Ecrit par <?php echo $text['login']; ?></p>

                        <img src="#" alt="">

                        <p>Le <?php echo date('d/m/Y', $date2); ?> </p>

                        <?php

                            if (isset($_SESSION['id'])) {

                                echo "<a href='#1' class='com'>Laissez un commentaire</a>";
                            }
                        ?>

                    </div>

                </div>

                <div class="containerD">

                    <?php

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

                    ?>

                </div>

            </div>
            
        </div>
        
        <?php

            if (isset($_SESSION['id'])) :

        ?>
            <form action="#" method="post" class="insertcom">

                <div class="box3" id="1">

                    <p class="leavecom">Laissez un commentaire</p>
                    <label for="titre">Titre du commentaire</label>
                    <input type="text" name="titre" placeholder="votre titre">
                    <label for="corp">Votre commentaire</label>
                    <textarea id="corp" name="corp" placeholder="Votre article" rows="15" cols="33"></textarea>
                    <input type="submit" name="submit" value="Envoyer">

                </div>
                <img src="#" alt="logo" class="newlogo">
            </form>

        <?php

            endif;

        ?>
        
    </main>

    <footer>

        <?php

            require('php/include/footer.inc.php');

        ?>
    </footer>
</body>

</html>