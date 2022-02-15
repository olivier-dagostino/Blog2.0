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

        <h1>Gestion des Utilisateurs</h1>

        <table>

            <thead>

                <?php

                $info = new User();
                $res1 = $info->getAllInfoForAllUsers();

                ?>
                
            </thead>

            <tbody>


                <?php

                foreach ($res1 as $key => $value) { // pour chaque valeur qui se trouve dans la $res1 
                    echo '<tr>'; //on echo une ligne

                    foreach ($value as $key1 => $value1) { //Pour chaque info de l'étudiant on écho une case

                        echo "<td>$value1</td>";
                        // j'echo l'info

                    }


                    echo"<td>
                                <form action='php/include/admin.inc.php' method='POST'>
                                    <input type='text' name='id' value='" . $value['id'] . "' hidden>
                                    <select name='select-droits' id='select-droitd'>

                                        <option>--Droits--</option>
                                        <option value='1'>Utilisateurs</option>
                                        <option value='42'>Modérateur</option>
                                        <option value='1337'>Admin</option>

                                    </select>
                                
                                    <button type='submit' name='submit'>Modifier les Droits</button>

                                </form>
                                
                            </td>";

                    echo '</tr>';
                }
                
                // if ($_POST['delete']) {

                //     $info = new User();
                //     $res1 = $info->deleteUser($value['id']);
                //     echo 'Votre Compte à bien été supprimé';
                //     session_unset();
                //     header('location: index.php');
                // }
                // <form action='#' method='POST'>
                // <input type='text' name='id' value='" . $value['id'] . "' hidden>
                // <button type='submit' name='delete'>Supprimer</button>

                // </form>
                ?>


                <tr></tr>

            </tbody>
        </table>

    </main>

<?php require 'php/include/footer.inc.php';
} ?>