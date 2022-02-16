<?php

session_start();

if ($_SESSION['droits'] != 1337) {

    header('Location: index.php');
} else {

    $title = "Gestion des Utilisateurs";
    $css = "admin";
    require('php/include/header.inc.php');

?>
    <main>

        <section class="gestion-user">
            <h1>Gestion des Utilisateurs</h1>
            <table>


                <thead>

                    <?php

                    $user = new User();
                    $res1 = $user->getList();

                    ?>

                </thead>

                <tbody>


                    <?php

                    foreach ($res1 as $key => $value) {

                        echo '<tr>';

                        foreach ($value as $key1 => $value1) {

                            echo "<td>test</td>";
                        }

                        echo "<td>
                                <form action='php/include/admin.inc.php' method='POST'>

                                    <input type='text' name='id' value='" . $value['id'] . "' hidden>

                                    <select name='select-droits' id='select-droitd'>

                                        <option>--Droits--</option>
                                        <option value='1'>Utilisateurs</option>
                                        <option value='42'>Modérateur</option>
                                        <option value='1337'>Admin</option>

                                    </select>
                                
                                    <button type='submit' name='submit'>Modifier les Droits</button>

                                    <button type='submit' name='delete'>Supprimer</button>

                                </form>
                                    
                            </td>";

                        echo '</tr>';
                    }

                    ?>


                </tbody>

            </table>

        </section>

        <section class="gestion-article">

            <h1>Gestion des Articles</h1>
            <table>


                <thead>

                    <?php

                    $article = new Article();

                    $articles = $article->getList();

                    $categorie = new Categorie();

                    $getCategories = $categorie->getCategories();

                    ?>

                    <form action="" method="POST">

                        <select name='categorie' id='select-droitd'>

                            <option>--Catégorie--</option>
                            <?php

                            foreach ($getCategories as $index => $categorie) {

                                echo "<option value = '" . $categorie['id'] . "'>" . $categorie['nom'] . "</option>";
                            }


                            ?>
                        </select>
                        </form>
                </thead>

                <tbody>

                    <?php

                    foreach ($articles as $key => $article) {

                        echo '<tr>';

                        foreach ($article as $key1 => $value1) {

                            echo "<td>$value1</td>";
                        }

                        echo "<td>
                                <form action='php/include/admin.inc.php' method='POST'>

                                <input type='text' name='id' value='" . $value['id'] . "' hidden>
                                <input type='text' name='id' value='" . $value['id_categorie'] . "' hidden>
                                
                                    <select name='categorie' id='catégorie'>

                                        <option>--Droits--</option>
                                        <option value='1'>Utilisateurs</option>
                                        <option value='42'>Modérateur</option>
                                        <option value='1337'>Admin</option>

                                    </select>
                                
                                    <button type='submit' name='submit'>Modifier les Droits</button>

                                    <button type='submit' name='delete'>Supprimer</button>

                                </form>
                                    
                            </td>";

                        echo '</tr>';
                    }

                    ?>

                </tbody>

            </table>

        </section>

        <section class="gestion-cat">

            <h1>Gestion des Catégories</h1>

        </section>

        <section class="gestion-com">

            <h1>Gestion des Commentaires</h1>

        </section>

    </main>

<?php require 'php/include/footer.inc.php';
} ?>