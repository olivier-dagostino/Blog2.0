<?php
require_once('class_dbh.php');

class Article extends Dbh
{
    public $article;
    public $id_utilisateur;
    public $id_categorie;
    public $date;

    public function creation($article, $id_utilisateur, $id_categorie)
    {

        $sth = $this->connect()->prepare("INSERT INTO `articles`(`article`,`id_utilisateur`,`id_categorie`,`date`) VALUES(?,?,?,?)");
        $date = new DateTime();
        $date->setTimestamp(time());
        $jour = $date->format('Y-m-d H:i:s');
        $sth->execute(array($article, $id_utilisateur, $id_categorie, $jour));

    }

    // récupère les 5 derniers article
    public function get5Article($get, $categorie = '') 
    {

        if (empty($categorie)) {

            $sth = $this->connect()->prepare("SELECT `articles.article`, `articles.date`, `utilisateurs.login`, `utilisateurs.active`,` articles.id`  FROM `articles` INNER JOIN `utilisateurs` on `utilisateurs.id` = `articles.id_utilisateur` WHERE `articles.enligne` != 1 ORDER BY date DESC LIMIT $get,5 ");
            
        } else {
            $sth = $this->connect()->prepare("SELECT `articles.article`, `articles.date`, `utilisateurs.login`, `utilisateurs.active`, `articles.id`  FROM `articles` INNER JOIN `utilisateurs` on `utilisateurs.id` = `articles.id_utilisateur` WHERE `articles.enligne` !=1 AND `articles.id_categorie` = $categorie ORDER BY date DESC LIMIT $get,5 ");
        }
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getArticleById($get)
    {
        $sth = $this->connect()->prepare("SELECT `articles.article`, `utilisateurs.login`, `articles.date` FROM `articles` INNER JOIN `utilisateurs` ON `articles.id_utilisateur` = `utilisateurs.id` WHERE `articles.id` = $get");
        $sth->execute();
        $article= $sth->fetchAll();
        return$article;
    }

    public function getAllInfoById($id)
    {
        $sth = $this->connect()->prepare("SELECT * FROM `articles` WHERE `articles.id` = $id");
        $sth->execute();
        $article= $sth->fetchAll(PDO::FETCH_ASSOC);
        return$article;
    }
    public function getAllArticle()
    {
        $sth=$this->connect()->prepare("SELECT * FROM `articles`");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function update($article, $catego, $enligne,$id)
    {
        $sth=$this->connect()->prepare("UPDATE `articles` SET `article` = ?, `id_categorie` = ?, `enligne` = ? WHERE `id` = $id");
        $sth->execute(array($article,$catego,$enligne));
        echo "<p> Votre Modification a été prise en compte</p>";

    }



}