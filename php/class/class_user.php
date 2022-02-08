<?php
require('class_dbh.php');

class User extends Dbh
{
  private $id;
  public $login;
  public $password;
  public $email;
  public $droits;

  public function register($login, $password, $email)
  {

    try {

      $req = $this->connect->prepare("SELECT * FROM `utilisateurs` WHERE login=?");
      $req->execute();
    } catch (Exception $e) {

      echo 'Exception reçue : ', $e->getMessage(), "\n";
    }

    $res = $req->fetch(PDO::FETCH_ASSOC);
    if ($res == false) {

      try {

        $sth = $this->connect()->prepare("INSERT INTO `utilisateurs` (`login`, `password`, `email`) VALUES (?,?,?)");
        $passwordprotect = password_hash($password, PASSWORD_DEFAULT);
        $sth->execute(array($login, $passwordprotect, $email));
        $confirmation = '<p>Bienvenue ' . $_POST['login'];
        echo $confirmation;
        header('Refresh:3; URL=connexion.php');
      } catch (Exception $e) {

        echo 'Exception reçue : ', $e->getMessage(), "\n";
      }
    } elseif ($res == true) {

      $error2 = "<p>Ce Login existe déjà</p>";
      echo $error2;
    }
  }

  public function login($login, $password)
  {

    $sth = $this->connect()->prepare("SELECT * FROM `utilisateurs` WHERE `login` =?");
    $sth->execute(array($login));
    $res = $sth->fetch(PDO::FETCH_ASSOC);

    if ($login === $res['login'] && password_verify($password, $res['password'])) {

      $this->id = $res['id'];
      $this->login = $login;
      $this->password = $password;
      $this->email = $res['email'];
      $this->droits = $res['id_droits'];
      $_SESSION['login'] = $login;
      $_SESSION['id'] = $res['id'];
      $_SESSION['droits'] = $res['id_droits'];
      echo "<p>Vous êtes bien connecté, vous allez être rediriger</p>";
      header('Refresh:1; URL=index.php');
    } elseif ($login === $res['login'] && password_verify($password, $res['password'])) {

      echo '<p >Votre compte est inactif veuillez contacter votre administrateur</p>';
    } else {

      echo '<p>Verifiez votre Login/Mot de passe</p>';
    }
  }

  public function disconnect()
  {

    if (isset($_SESSION)) {

      session_unset();
      header("location:index.php");
    }
  }

  public function getLogin($login)
  {

    $sth = $this->connect()->prepare("SELECT `login` FROM `utilisateurs` WHERE `login` ='$login' ");
    $sth->execute();
    return $sth->fetch();
  }

  public function getAllInfoForUser($login)
  {

    $sth = $this->connect()->prepare("SELECT * FROM `utilisateurs` WHERE `login` = '$login' ");
    $sth->execute();
    $res = $sth->fetch(PDO::FETCH_ASSOC);
    return $res;
  }

  public function getAllInfoForAllUsers()
  {

    $sth = $this->connect()->prepare("SELECT * FROM `utilisateurs`");
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }

  public function update($login, $password, $email)
  {

    $log = $_SESSION['login'];
    $sth = $this->connect()->prepare("SELECT `id` FROM `utilisateurs` WHERE `login` = '$log' ");
    $sth->execute();
    $res = $sth->fetch(PDO::FETCH_ASSOC);
    $this->login = $login;
    $this->email = $email;
    $this->password = $password;
    $_SESSION['login'] = $login;
    $id = $_SESSION['id'];

    try {

      $sth2 = $this->connect()->prepare("UPDATE `utilisateurs` SET `login` = ?,`password` = ?,`email` = ? WHERE `id` = '$id'");
      $sth2->execute(array($login, password_hash($password, PASSWORD_DEFAULT), $email));
      echo "<p>Modifications effectuées</p>";
    } catch (Exception $e) {

      echo 'Exception reçue : ', $e->getMessage(), "\n";
    }
  }

  public function isConnected()
  {

    if (isset($_SESSION['login'])) {

      return true;
    } else {

      return false;
    }
  }

  public function getAllInfoById($id)
  {

    $sth = $this->connect()->prepare("SELECT * FROM utilisateurs WHERE id=$id");
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }

  public function getAllInfo()
  {

    $sth = $this->connect()->prepare("SELECT * FROM utilisateurs");
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }

  public function updateAdmin($id, $droits)
  {

    $sth = $this->connect()->prepare("UPDATE utilisateurs SET id_droits = ? WHERE id=$id");
    $sth->execute(array($droits));
    echo "<p>Modification prise en compte</p>";
  }

  public function deleteUser($id)
  {

    $sth = $this->connect()->prepare("DELETE FROM `utilisateurs` WHERE `id`= $id");
    $sth->execute();
    echo "<p>Nous vous confirmons la Suppression de Votre Compte </p>";
  }
}
