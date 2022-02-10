<?php

    session_start();

    if ($_SESSION['droits'] != 1337) {

        header('Location: index.php');
    } else {

        $title = "Admin";
        $css = "admin";
        require ('php/include/header.inc.php');

?>
    <main>

        <h1>Gestion des Utilisateurs</h1>

        <table>

            <thead>

                <?php

                $info = new User();
                $res1 = $info->getAllInfoForAllUsers();

                echo '<tr>';
                foreach ($res1 as $key => $value) {
                }
                echo '</tr>';
                ?>

            </thead>

            <tbody>

                <tr>
                    <?php

                        foreach ($res1 as $key => $value) { // pour chaque valeur qui se trouve dans la $res1 (pour chaques étudiants) 
                            echo '<tr>'; //on echo une ligne

                            foreach ($value as $key1 => $value1){ //Pour chaque info de l'étudiant on écho une case
                                
                                echo "<td>$value1</td>";  // j'echo l'info
                            }
                            echo '</tr>';
                        }

                    ?>
                </tr>

            </tbody>
        </table>

    </main>

    <footer>

        <?php require 'php/include/footer.inc.php'; ?>

    </footer>
</body>

</html>

<?php 

    }
 
?>