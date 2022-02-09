<?php

class Categorie
{
    private $id;
    public $nom;
    private $bd;

    public function __construct()
    {
        $this->bd = new PDO('mysql:host=localhost:8889;dbname=blog', 'root', 'root');
    }

    public function getcategories()
    {
        $sth = $this->bd->prepare("SELECT * FROM `categories` ");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getid($nom)
    {
        $sth=$this->bd->prepare("SELECT `id` FROM `categories` WHERE nom='$nom'");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return$res;
    }
    public function getAllInfoById($id)
    {
        $sth = $this->bd->prepare("SELECT * FROM `categories` WHERE `categories.id` = $id");
        $sth->execute();
        $catego= $sth->fetchAll(PDO::FETCH_ASSOC);
        return$catego;
    }
    public function getAllCategories()
    {
        $sth=$this->bd->prepare("SELECT * FROM `categories`");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getCategoriesByName($name)
    {
        $sth=$this->bd->prepare("SELECT * FROM `categories` WHERE `nom` = '$name'");
        $sth->execute();
        $res=$sth->fetch();
        return $res;
    }

    public function updateAdmin($nom,$get)
    {
        $sth=$this->bd->prepare("UPDATE `categories` SET `nom` =? WHERE `id` = $get ");
        $sth->execute(array($nom));
        echo"<p> Votre Catégorie a bien été modifié</p>";
    }

    public function createCategories($nom)
    {
        $sth=$this->bd->prepare("INSERT INTO `categories`(`nom`) VALUES (?)");
        $sth->execute(array($nom));
        echo "<p>Nouvelle Catégorie bien enregistrer/p>";
    }
}