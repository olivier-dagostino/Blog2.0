<?php

    session_start();
    if (!isset($_SESSION['id'])) {

    header('Location: index.php');

} else {

    $title = "Accueil";
    $css = "index";
    require ('php/include/header.inc.php'); 

?>



    <main>

        <div class="sup">

            <h1>Suppression du Compte</h1>

            <p>Êtes vous sûr de bien ouloir supprimer Votre compte ?</p>    

            <form method="POST" action="">


                <input type="submit" name="delete" value="Supprimer mon Compte">
                <?php

                    

                    if ($_POST['delete']) {

                        $info = new User();
                        $res1 = $info->deleteUser($_SESSION['id']);
                        echo 'Votre Compte à bien été supprimé';
                        session_unset();
                        header('location: index.php');
                    }

                ?>

            </form>

        </div>

    </main>

    <?php include('php/include/footer.inc.php') ; } ?>