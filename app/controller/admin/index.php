<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
protection("user", "user", "login", USER_ADMIN);

$users = selecttable("user", array('orderby' => "user_firstname",
                                                "order" => "ASC",
                                              "limite" => ":offset", ":limit"));
$logements = selecttable("logement", array('orderby' => "logement_name",
                                                "order" => "ASC",
                                              "limite" => ":offset", ":limit"));
$nb_commentaires = counttable("comment");

$place = selecttable('location_place', array("orderby" => "place_name",
    "order" => "ASC",
    "limite" => ":offset", ":limit"
));



// Afficher les commentaires vec pagination
if (!isset($_GET["page"]))
  $page = 1;
else {
  $page = $_GET["page"];
}
  $offset= ($page -1) * PAGINATION_COMMENTS;


$options = array("orderby" => "comment_date",
                 "order" => "DESC",
                 "limit" => PAGINATION_COMMENTS,
                 "offset" => $offset);

if (isset($_GET["user"])) {
$options["wherecolumn"] = "comment_user_id";
$options["wherevalue"] = $_GET["user"];
}
$commentaire = selecttable("comment", $options);

//compte le nombre de commentaires
if (isset($_GET["user"])) {
  $options = array( "wherecolumn" => "comment_user_id",
                             "wherevalue" => $_GET["user"]);
}
else {
  $options = array();
}

$nb_commentaires = counttable("comment", $options);
define("BODY_CLASS", "gestion");
define("PAGE_TITLE", "Page d'accueil Admin");

include_once("app/view/admin/index.php");

