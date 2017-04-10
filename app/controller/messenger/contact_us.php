<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");

if(!isset($_POST["title"])) {


   

define("BODY_CLASS", "contact_us");
define("PAGE_TITLE", "Nous contacter");
include_once("app/view/messenger/contact_us.php");

} else {

  
    include_once('app/model/messenger/contact_us.php');
    $message = contact_us($_POST, $_SESSION["user"]["user_id"]);
    var_dump($reservation);  

  if(!$message) {

        //        header("location:?module=article&action=new&notif=nok");
        location("logement", "index", "notif=nok");

    } else {

//        header("location:?module=article&action=detail&id=".$retour."&notif=ok");
        location("logement", "index", "&notif=ok");

    }

}
