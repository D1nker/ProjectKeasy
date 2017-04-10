<?php 
protection("user", "user", "login", USER_LAMBDA);

$options = array("wherecolumn" => "user_id", "wherevalue" => $_SESSION["user"]["user_id"]);

$users = selecttable('user', $options);

foreach ($users as $cle => $user) {

  $users[$cle]['user_lastname'] =  $user['user_lastname'];
  $users[$cle]['user_firstname'] =  $user['user_firstname'];
  $users[$cle]['user_mail'] =  $user['user_mail'];
  $users[$cle]['user_password'] =  $user['user_password'];
  $users[$cle]['user_age'] =  $user['user_age'];
  $users[$cle]['user_gender'] =  $user['user_gender'];
  $users[$cle]['user_phone_number'] =  $user['user_phone_number'];
  $users[$cle]['user_description'] =  $user['user_description'];
  $users[$cle]['user_nationality'] =  $user['user_nationality'];

}



  
define("PAGE_TITLE", "Page mon profil");
define("BODY_CLASS", "user_index");
include_once("app/view/user/index.php");


