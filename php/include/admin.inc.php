<?php

require('autoloader.inc.php');



if ($_POST['submit'] !== null) {
    // var_dump($_POST);
    // die;

    $sth2 = $this->connect()->prepare("UPDATE `utilisateurs` SET `id_droits` = ? WHERE ''");
    $sth2->execute(array($_POST['select-droits']));
    echo "<p>Modifications effectuées</p>";
}
?>