<?php
require_once('class_dbh.php');

class Commentaire extends Dbh
{
    
    public function getComAndUserById($get)
    {
        $sth = $this->connect()->prepare("SELECT commentaires.commentaire, commentaires.date, utilisateurs.login, utilisateurs.active FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id WHERE id_article =$get ORDER BY date DESC");
        $sth->execute();
        $commentaire = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $commentaire;

    }

    public function insertcom($com,$get,$user)
    {
        $sth=$this->connect()->prepare("INSERT INTO `commentaires`(`commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES (?,?,?,?)");
        $date = new DateTime();
        $date->setTimestamp(time());
        $jour = $date->format('Y-m-d H:i:s');
        $sth->execute(array($com,$get,$user,$jour));
    }

    public function getComByIdArticle($get)
    {
        $sth=$this->connect()->prepare("SELECT * FROM `commentaires` WHERE `id_article` = $get");
        $sth->execute();
        $sth2=$sth->fetchAll(PDO::FETCH_ASSOC);
        return$sth2;
    }

    public function getAllCom()
    {
        $sth=$this->connect()->prepare("SELECT * FROM `commentaires`");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return$res;
    }

    public function getCombWithId($get)
    {
        $sth=$this->connect()->prepare("SELECT * FROM `commentaires` WHERE `id` = $get");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;

}
    public function getComById($get)
    {
        $sth=$this->connect()->prepare("SELECT * FROM `commentaires` WHERE `id` = $get");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return$res;
    }

    public function updateAdmin($text,$get)
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