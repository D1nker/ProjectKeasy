<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
function verif_login($form){

    global $pdo;

    try {

        $sql = "SELECT * FROM user WHERE user_mail=:mail AND user_password=:mdp AND token=1";
        $query = $pdo->prepare($sql);

        $query->bindParam(':mail', $form["mail"], PDO::PARAM_STR);
        $query->bindParam(':mdp', $form["mdp"], PDO::PARAM_STR);
        

        // On execute la requête
        $query->execute();

        // On récupère tous les résultats
        $users = $query->fetchAll();

        // Supprimer le curseur
        $query->closeCursor();

        // On recupere un user ou bien false
        if ((empty($users)) || (sizeof($users) > 1 ))
            return false;
        else
            return $users[0];

    }

    catch (Exception $e){
        die("Connection à MySQL impossible : " . $e->getMessage());
    }
}
