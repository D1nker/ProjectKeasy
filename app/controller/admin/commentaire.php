<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
protection("user", "user", "login", USER_ADMIN);

$logements = selecttable("logement", array('orderby' => "logement_name",
                                                "order" => "ASC",
                                              "limite" => ":offset", ":limit"));

$nb_commentaires = counttable("comment");

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

include_once("app/view/layout/commentaires.php");
