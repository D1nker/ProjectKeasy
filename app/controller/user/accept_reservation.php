<?php 



if(isset($_GET["id"]) && isset($_GET["logementId"])) {

    include_once("app/model/user/accept_resa.php");
    $resultat = accept_resa($_GET['id']);
   
    $dispo = edit_logement($_GET['logementId']);

    if (($resultat) && ($dispo)) {
      header("Location:?module=user&action=index&notif=ok");
    } 
    else {
      echo "nooook";
      var_dump($resultat);
      var_dump($dispo);
    }   
}




 

define("BODY_CLASS", "accept_resa");
define("PAGE_TITLE", "Accepter une réservation");
include_once("app/view/user/index.php");
