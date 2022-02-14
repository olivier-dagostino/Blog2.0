<?php

    if ($_SESSION['droits'] == '42' || $_SESSION['droits'] == '1337') {

    header('Location: index.php');

} else {

    session_start();
    $title = "Edition";
    $css = "edit_articles";
    
    require ('php/include/header.inc.php');

?>

    <main>

        <?php

            if (isset($_POST['submit'])) {

                if (empty($_POST['titre']) || empty($_POST['article']) || empty($_POST['categories'])) {

                    echo "<p> Veuillez remplir tout les champs</p>";
                } 
                
                else{

                    $id_categories = $_POST['categories'];                        

                    $insert = new Article();

                    $insert->creation($_POST['titre'], $_POST['article'], $_SESSION['id'], $id_categories);

                    echo "<p>Votre article est correctement enregistré</p>";
                }
            }
        ?>

        <h1>Crétation d'un Article</h1>

        <div class="containerA">
            
            <form action=""  method="POST" class="articlecreate">

                

                <label for="categories">Catégorie</label>

                    <select name="categories" id="categories" >

                        <option>--Choisir une Catégorie--</option>';

                            <?php
                                $categories = new Categorie();

                                $res5 = $categories->getCategories();

                                for ($i = 0; isset($res5[$i]); $i++) {

                                    echo "<option value='" . $res5[$i]['id'] . "'>" . $res5[$i]['nom'] . '</option>';

                                }
                            ?> 

                    </select>

                <label for="titre">Titre de l'article</label>
                <input name="titre" type="text" placeholder="Votre titre">

                <label for="article">Article</label>
                <textarea id="article" name="article" placeholder="Votre article" rows="20" cols="40"></textarea>
                <input type="submit" name="submit" value="Envoyer">

            </form>

        </div>

    </main>

    <?php include('php/include/footer.inc.php'); } ?>

