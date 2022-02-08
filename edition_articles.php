<?php
session_start();
// var_dump($_SESSION['droits']);
if ($_SESSION['droits'] == '1') {

    header('Location: index.php');
} else {

    require "php/class/class_categorie.php";
    require "php/class/class_article.php";
    require "php/class/class_user.php";

?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Indie+Flower&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/edition_articles.css">
        <link rel="stylesheet" href="assets/css/footer.css">

        <title>Edition d'Article</title>
    </head>

    <body>

        <header>

            <?php include('php/include/header.inc.php') ?>

        </header>


        <main>
            <?php
                if (isset($_POST['submit'])) {
                    if (empty($_POST['titre']) || empty($_POST['corp-txt'])) {
                        echo "<p> Veuillez remplir tout les champs</p>";
                    } else
                    if (isset($_POST['categories'])) {
                        $article = $_POST['titre'] . '/' . $_POST['corp-txt'];
                        $nom = $_POST['categories'];
                        var_dump($_POST[$nom]);
                            $categories2 = new Categorie();
                            $idcategories = $categories2->getid($nom);
                            $insert = new Article();
                            $insert->creation($article, $_SESSION['id'], $idcategories['id']);
                            echo "<p>Votre article est correctement enregistré</p>";
                        }
                }
            ?>
            <h1>Crétation d'un Article</h1>

            <div class="containerA">
                
                <form action=""  method="POST" class="articlecreate">

                    

                    <label for="categories">Catégorie</label>
                    <select name="categories" id="categories">
                    <option>--Choisir une Catégorie--</option>';
                       <?php
                        $categories = new Categorie();
                        $res5 = $categories->getcategories();
                        for ($i = 0; isset($res5[$i]); $i++) {
                            echo '<option value=' . $res5[$i]['nom'] . '>' . $res5[$i]['nom'] . '</option>';
                        }
                        ?> 
                    </select>
                    <label for="titre">Titre de l'article</label>
                    <input name="titre" type="text" placeholder="Votre titre">
                    <label for="-txt-txt">Article</label>
                    <textarea id="corp-txt" name="corp-txt" placeholder="Votre article" rows="20" cols="40"></textarea>
                    <input type="submit" name="submit" value="Envoyer">
                </form>

            </div>



        </main>


        <footer>

            <?php include('php/include/footer.inc.php') ?>

        </footer>

    </body>

    </html>

<?php } ?>