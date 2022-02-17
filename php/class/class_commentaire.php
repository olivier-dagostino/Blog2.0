<?php
require_once('class_dbh.php');

class Commentaire extends Dbh
{
    
    // Récupere les commentaires d'un article spécifique et les affiche
    public function getCommentaires($id_article)
    {
        $sth = $this->connect()->prepare("SELECT commentaires.titre, commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id WHERE id_article = :id ORDER BY date DESC;");

        $sth->execute(array(':id' => $id_article));

        if ($sth->rowCount() == 0){
            echo "<p>Il n'y a aucun commentaire</p>";
        } else {
            
            $commentaires = $sth->fetchAll(PDO::FETCH_ASSOC);

            echo "<h3>Les commentaires</h3>";

            for ($i = 0; isset($commentaires[$i]); $i++) {

                echo "<section><p>Titre : " . $commentaires[$i]['titre'] . "</p>";

                echo "<p>Ecrit par  " . $commentaires[$i]['login'];
                $date = strtotime($commentaires[$i]['date']);
                echo " le " . date('d/m/Y', $date) . "</p>";

                if (isset(($_SESSION['droits']))){

                    if ($_SESSION['droits'] == 42 || $_SESSION['droits'] == 1337) {

                        echo ""
                    }
                }
                
                    
                    echo
            }


                echo "<p>" . $commentaires[$i]['commentaire'] . "</p></section>";
            }

        }

    }

    // Insère un commentaire en base de donnée puis l'affiche
    public function insertCommentaire($titre, $commentaire, $id_article, $id_utilisateur)
    {
        $sth = $this->connect()->prepare("INSERT INTO commentaires (titre, commentaire, id_article,id_utilisateur) VALUES (:titre, :commentaire, :id_article, :id_utilisateur)");
        
        $sth->execute(array(
            ':titre' => $titre, 
            ':commentaire' => $commentaire, 
            ':id_article' => $id_utilisateur, 
            ':id_utilisateur' => $id_article));
    }

    public function updateCommentaire($text,$get)
    {
        $sth=$this->connect()->prepare("UPDATE `commentaires` SET `commentaire`=? WHERE `id` = $get");
        $sth->execute(array($text));
        echo"<p> Modification prise en compte</p>";
    }

    public function delete($get)
    {
        $sth=$this->connect()->prepare("DELETE FROM `commentaires` WHERE `id` = $get");
        $sth->execute();
        echo "<p> Commentaire supprimé</p>";
    }
}