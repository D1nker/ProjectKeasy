<?php 
protection("user", "user", "login", USER_LAMBDA);

include_once("app/model/user/valid_reservation.php");


  $user = $_SESSION['user']['user_id'];

  if (!isset($_GET["page"]))
    $page = 1;
  else {
  $page = $_GET["page"];
  }

  $offset= ($page -1) * PAGINATION_USERS;

  $resas = lire_resa($offset, PAGINATION_USERS, $user);

  foreach ($resas as $cle => $resa) {

    $resas[$cle]['logement_name'] =  $resa['logement_name'];
    $resas[$cle]['logement_price'] =  $resa['logement_price'];
    $resas[$cle]['place_name'] =  $resa['place_name'];
    $resas[$cle]['logement_category_type'] =  $resa['logement_category_type'];
    $resas[$cle]['reservation_date_arrive'] =  $resa['reservation_date_arrive'];
    $resas[$cle]['reservation_date_return'] =  $resa['reservation_date_return'];
    $resas[$cle]['user_lastname'] =  $resa['user_lastname'];
    $resas[$cle]['user_firstname'] =  $resa['user_firstname'];
    $resas[$cle]['reservation_id'] =  $resa['reservation_id'];
    $resas[$cle]['logement_photo'] =  $resa['logement_photo'];
    $resas[$cle]['logement_id'] =  $resa['logement_id'];
    $resas[$cle]['token_reservation'] = $resa['token_reservation'];
  }

define("PAGE_TITLE", "Keasy, liste de vos réservations");
define("BODY_CLASS", "resa_valid");
include_once("app/view/user/reservation_etudiant.php");