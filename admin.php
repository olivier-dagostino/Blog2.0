<?php

session_start();

if ($_SESSION['droits'] != 1337) {

    header('Location: index.php');
} else {

    $title = "Gestion des Utilisateurs";
    $css = "admin";
    require('php/include/header.inc.php');

    $user = new User();
    $article = new Article();
    $categorie = new Categorie();
   
    $res1 = $user->getList();
    $articles = $article->getList();
    $getCategories = $categorie->getCategories();

?>
    <main>

        <section class="gestion-user">

            <h1>Gestion des Utilisateurs</h1>

            <table>

                    <?php

                    foreach ($res1 as $key => $value) {

                        echo '<tr>';

                        foreach ($value as $key1 => $value1) {

                            echo "<td>$value1</td>";
                        }

                        echo "<td>

                                <form action='php/include/admin.inc.php' method='POST'>

                                    <input type='text' name='id' value='" . $value['id'] . "' hidden>

                                    <select name='select-droits' id='select-droitd'>

                                        <option>- Droits -</option>
                                        <option value='1'>Utilisateurs</option>
                                        <option value='42'>Modérateur</option>
                                        <option value='1337'>Admin</option>

                                    </select>
                                
                                    <button type='submit' name='modif_droit'>Modifier les Droits</button>

                                    <button type='submit' name='delete_user'>Supprimer</button>

                                </form>
                                    
                            </td>";

                        echo '</tr>';

                    }

                ?>

            </table>

        </section>

        <section class="gestion-article">

            <h1>Gestion des Articles</h1>

            <table>

                <?php

                    foreach ($articles as $key => $article) {

                        echo '<tr>';

                        foreach ($article as $key1 => $value) {

                            echo "<td>$value</td>";
                        }

                        echo "<td>
                                <form action='php/include/admin.inc.php' method='POST'>

                                <input type='text' name='id_article' value='" . $article['id'] . "' hidden>
                                <input type='text' name='id_categorie' value='" . $article['id_categorie'] . "' hidden>
                                
                                    <select name='categorie' id='catégorie'>
                                    <option>- Catégorie -</option>";
                                    foreach ($getCategories as $index => $categorie) {

                                        echo "<option value = '" . $categorie['id'] . "'> - " . $categorie['id'] . " - " . $categorie['nom'] . "</option>";
                                    }                                    

                                    echo "</select>
                                
                                    <button type='submit' name='modif_categorie'>Modifier la catégorie</button>

                                    <button type='submit' name='delete_article'>Supprimer Article</button>

                                </form>
                                    
                            </td>";

                        echo '</tr>';

                    }

                ?>

            </table>

        </section>

        <section class="gestion-cat">

            <h1>Gestion des Catégories</h1>

            <table>

                <?php

                    foreach ($getCategories as $key => $value) {

                        echo '<tr>';

                        foreach ($value as $key1 => $value2) {

                            echo "<td>$value2</td>";
                        }

                        echo "<td>
                                <form action='php/include/admin.inc.php' method='POST'>

                                <input type='text' name='id' value='" . $article['id'] . "' hidden>
                                <input type='text' name='id' value='" . $article['id_categorie'] . "' hidden>

                                    <button type='submit' name='delete'>Supprimer Article</button>

                                </form>
                                    
                            </td>";

                        echo '</tr>';
                        
                    }

                ?>

            </table>

        </section>

    </main>

<?php require 'php/include/footer.inc.php';
} ?>