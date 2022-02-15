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

    public function getArticleById($id_article)
    {
        $sth = $this->connect()->prepare("SELECT articles.titre, articles.article, utilisateurs.login, articles.date FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id WHERE articles.id = $id_article ;");

        $sth->execute();

        $article= $sth->fetchAll();

        return $article;
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

    public function totalPages()
    {
        // On prépare la requête
        $query = $this->connect()->prepare('SELECT COUNT(*) AS nb_articles FROM `articles`;');

        // On exécute
        $query->execute();

        // On récupère le nombre d'articles
        $result = $query->fetch();

        $nbArticles = (int) $result['nb_articles'];

        // On détermine le nombre d'articles par page
        $parPage = 10;

        // On calcule le nombre de pages total
        $pages = ceil($nbArticles / $parPage);

        return $pages;
    }

    //récupérer les articles en fonction de la pagination et de la catégorie
    public function getArticles(int $limit, $start, $categorie = '')
    {

        if (isset($categorie) && !empty($categorie)){

            $getArticles = $this->connect()->prepare("SELECT articles.titre, articles.article, articles.date, articles.id, utilisateurs.login FROM articles INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur AND articles.id_categorie = :categorie ORDER BY date DESC LIMIT :start,5 ");

            $getArticles->bindValue(':start', $start, PDO::PARAM_INT);
            $getArticles->bindValue(':categorie', $categorie, PDO::PARAM_INT);
            
            $getArticles->execute();
            
            $articles = $getArticles->fetchAll(PDO::FETCH_ASSOC);

            foreach ($articles as $article) {
                                
                echo "<article><h2>" . $article["titre"] . "</h2>";
            
                echo "<p>" . $article["article"] . "</p>";
            
                echo "<p>Auteur : " . $article["login"] . "</p>";
            
                echo "<p>Ecrit le : " . $article["date"] . "</p>";
                
                echo "<a href='article.php?id=" . $article['id'] . "'><img src='assets/img/comment.png' alt='comment icons'>Commentaires</a></article>";
            
            }        
            
            return $articles;
            
        } else {

            $getArticles = $this->connect()->prepare("SELECT articles.titre, articles.article, articles.date, articles.id, utilisateurs.login FROM articles INNER JOIN utilisateurs on utilisateurs.id = articles.id_utilisateur ORDER BY date DESC LIMIT :start,:limit");

            $getArticles->bindValue(':start', $start, PDO::PARAM_INT);
            $getArticles->bindValue(':limit', $limit, PDO::PARAM_INT);
    
            // On exécute
            $getArticles->execute();
    
            // On récupère les valeurs dans un tableau associatif
            $articles = $getArticles->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($articles as $article) {
                                
                echo "<article><h2>" . $article["titre"] . "</h2>";
            
                echo "<p>" . $article["article"] . "</p>";
            
                echo "<p>Auteur : " . $article["login"] . "</p>";
            
                echo "<p>Ecrit le : " . $article["date"] . "</p>";
                
                echo "<a href='article.php?id=" . $article['id'] . "'><img src='assets/img/comment.png' alt='comment icons'>Commentaires</a></article>";
            
            }        

            return $articles;
    
        }
    }
}