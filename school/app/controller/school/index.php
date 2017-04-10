<?php 
protection("school", "school", "login", USER_SCHOOL);

include_once("app/model/school/lire_users.php");


  $school = $_SESSION['school']['school_id'];

  if (!isset($_GET["page"]))
    $page = 1;
  else {
  $page = $_GET["page"];
  }

  $offset= ($page -1) * PAGINATION_USERS;

  $users = lire_users($offset, PAGINATION_USERS, $school);

  foreach ($users as $cle => $user) {

    $users[$cle]['user_firstname'] =  $user['user_firstname'];
    $users[$cle]['user_lastname'] =  $user['user_lastname'];
    $users[$cle]['user_age'] =  $user['user_age'];
    $users[$cle]['user_gender'] =  $user['user_gender'];
 
  }

include_once("app/model/school/lire_users_lambda.php");


  $school = $_SESSION['school']['school_id'];;
  $userrs = lire_users_lambda($offset, PAGINATION_USERS, $school);

    foreach ($userrs as $key => $userr) {

      $userrs[$key]['user_firstname'] =  $userr['user_firstname'];
      $userrs[$key]['user_lastname'] =  $userr['user_lastname'];
      $userrs[$key]['user_age'] =  $userr['user_age'];
      $userrs[$key]['user_gender'] =  $userr['user_gender'];
    }


  
define("PAGE_TITLE", "Back office écoles");
define("BODY_CLASS", "bo_school");
include_once("app/view/school/index.php");


