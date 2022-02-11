<?php
require_once('class_dbh.php');

class Article extends Dbh
{
    public $article;
    public $id_utilisateur;
    public $id_categorie;
    public $date;

    public function creation($titre, $article, $id_utilisateur, $id_categorie)
    {

        $sth = $this->connect()->prepare("INSERT INTO `articles`(`titre`,`article`,`id_utilisateur`,`id_categorie`,`date`) VALUES(?,?,?,?,?)");
        $date = new DateTime();
        $date->setTimestamp(time());
        $jour = $date->format('Y-m-d H:i:s');
        $sth->execute(array($titre, $article, $id_utilisateur, $id_categorie, $jour));


    }

    // récupère les 5 derniers article
    public function get5Article($get, $categorie = '') 
    {

        if (empty($categorie)) {

            $sth = $this->connect()->prepare("SELECT articles.article, articles.date, utilisateurs.login, utilisateurs.active, articles.id  FROM articles INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur ORDER BY date DESC LIMIT $get,5 ");
            
        } else {
            $sth = $this->connect()->prepare("SELECT articles.article, articles.date, utilisateurs.login, utilisateurs.active, articles.id  FROM articles INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur AND articles.id_categorie = $categorie ORDER BY date DESC LIMIT $get,5 ");
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
        $sth=$this->connect()->prepare("SELECT articles.article, articles.date, utilisateurs.login, articles.id FROM articles INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur LIMIT 5;");
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

    //fonction pour récupérer les trois derniers articles pour l'index
    public function getIndexArticles()
    {
        $getIndexArticles=$this->connect()->prepare("SELECT articles.titre, articles.article, articles.date, utilisateurs.login FROM articles INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur ORDER BY date DESC LIMIT 3;");

        $getIndexArticles->execute();

        $res=$getIndexArticles->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $article) {
                            
                echo "<article><h2>" . $article["titre"] . "</h2>";

                echo "<p>" . $article["article"] . "</p>";

                echo "<p>" . $article["login"] . "</p>";

                echo "<p>" . $article["date"] . "</p></article>"; 
            
        } 
    
        return $res;
        
    }



}