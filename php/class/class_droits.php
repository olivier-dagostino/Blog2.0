<?php

class Droits
{
    private $id;
    public $nom;
    private $bd;

    public function __construct()
    {
        $this->bd = new PDO('mysql:host=localhost:8889;dbname=blog','root','root');
    }

    public function getDroitsById($droits)
    {
        $sth = $this->bd->prepare("SELECT `nom` FROM `droits` WHERE `id` = '$droits'");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getDroits()
    {
        $sth = $this->bd->prepare("SELECT `nom` FROM `droits`");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getDroitsByName($nom)
    {
        $sth=$this->bd->prepare("SELECT `id` FROM `droits` WHERE `nom` = '$nom' ");
        $sth->execute();
        $res= $sth->fetch();
        return $res;
    }
}