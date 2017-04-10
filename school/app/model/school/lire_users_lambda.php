<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
function lire_users_lambda($offset, $limite, $school)
{
    global $pdo;

try {

    $query = $pdo->prepare('SELECT user_id, user_firstname, user_lastname, user_age, user_gender, cat_user_id, school_school_id, school_token
                                        
                                        FROM user
                                        WHERE cat_user_id= 1
                                        AND school_school_id= :school
                                        AND school_token= 1
                                        LIMIT :offset, :limite');
                      


    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->bindParam(':limite', $limite, PDO::PARAM_INT);
    $query->bindParam(':school', $school, PDO::PARAM_INT);
   

    $query->execute();
 
    $userrs = $query->fetchAll();

    $query->closeCursor();
 
    return $userrs;
}

 catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
 }
}