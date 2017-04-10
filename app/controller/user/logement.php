<?php 
protection("user", "user", "login", USER_LAMBDA);

include_once("app/model/user/lire_logements.php");


  $user = $_SESSION['user']['user_id'];
 
  $repertoire = "webroot/photos/";

  $logements = lire_logement($user);

foreach ($logements as $cle => $logement) {

    $logements[$cle]['logement_name'] =  $logement['logement_name'];
    $logements[$cle]['logement_price'] =  $logement['logement_price'];
    $logements[$cle]['place_name'] =  $logement['place_name'];
    $logements[$cle]['logement_category_type'] =  $logement['logement_category_type'];
    $logements[$cle]['logement_photo'] =  $logement['logement_photo'];

  }

define("PAGE_TITLE", "Keasy, liste de vos logements");
define("BODY_CLASS", "vos_logements");
include_once("app/view/user/logement.php");