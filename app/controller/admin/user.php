<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
$nb_users = counttable("user");


$users = selecttable('user', array("orderby" => "user_lastname",
    "order" => "ASC",
    "limite" => ":offset", ":limit"
));



// Traitement sur les données
foreach ($users as $cle => $user) {

    $users[$cle]['user_lastname'] =  $user['user_lastname'];
    $users[$cle]['user_firstname'] =  $user['user_firstname'];
    $users[$cle]['user_id'] =  $user['user_id'];
}

define("BODY_CLASS", "user");
define("PAGE_TITLE", "Liste des users");
include_once("app/view/admin/users.php");
