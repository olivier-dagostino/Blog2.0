<?php
//connexion à la base de donnée
class Dbh
{
    //Methode permettant la connexion à la BDD
    protected function connect()
    {
        
        try {

            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost; dbname=blog', $username, $password);
            return $dbh;
            
        } catch (PDOException $e) {
            print "Error! :" . $e->getMessage() . "<br/>";
            die();
        }

    }

}