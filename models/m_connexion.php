<?php
require_once PATH_MODELS . 'Model.php';

class Connexion extends Model{
    
    function verifieConnexion()
    {
        $sql = "SELECT *
        FROM Logins 
        WHERE username = ? and motdepasse = ?";

        $id_user = $this->executerRequete($sql, array($_POST['Username'], $_POST['Password']))->fetch();
        try{
            if($id_user==''){
                echo "<p class = \" alert-warning\"> Mot de passe ou login incorrect </p>";
            }
            else{
                echo "<p class = \" alert-success\"> Connection effectuée </p>";
                $_SESSION['id_user'] = $id_user;  
            }
        }
        catch (Exception $e){
            echo "<p class = \" alert-warning\"> Erreur : Mot de passe ou login incorrect </p>";
        }
    }
}


class Enregistrement extends Model{
    function enregistrement()
    {
        $sql = "INSERT INTO LOGINS 
        VALUES  (7, 5, '". $_POST['Username']. "', '" .$_POST['Password'] ."');";
        echo $sql;
        $this->executerRequete($sql);
    }

}

