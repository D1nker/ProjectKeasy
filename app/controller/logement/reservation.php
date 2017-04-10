<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");

if(!isset($_POST["dateA"])) {

    define("BODY_CLASS", "reservation");
    define("PAGE_TITLE", "faire une reservation");
    include_once("app/view/logement/reservation.php");

} 
else {
   var_dump($_POST);
  
    include_once('app/model/logement/reservation.php');
    $reservation = ajouter_reservation($_POST, $_SESSION["user"]["user_id"], $_GET['id']);
    var_dump($reservation);  

    if(!$reservation) {

        location("logement", "index", "notif=nok");

    } 
    else {
       
        location("logement", "detail", "id=" . $reservation . "&notif=ok");
        echo "Votre demande de réservation a été transmis au propriétaire";
    }
}
