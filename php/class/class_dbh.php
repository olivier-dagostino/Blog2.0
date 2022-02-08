<?php
//connexion à la base de donnée
class Dbh
{
    //Methode permettant la connexion à la BDD
    protected function connect()
    {
        
        try {

            $username = "root";
            $password = "root";
            $dbh = new PDO('mysql:host=localhost:8889; dbname=blog', $username, $password);
            return $dbh;
            
        } catch (PDOException $e) {
            print "Error! :" . $e->getMessage() . "<br/>";
            die();
        }

    }

    protected function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}
