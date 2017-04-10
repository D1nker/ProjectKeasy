<?php 
$place = selecttable('location_place', array("orderby" => "place_name",
                                                        "order" => "ASC",
                                        "limite" => ":offset", ":limit"
                                        ));
$types = selecttable('cat_logement', array("orderby" => "logement_category_type",
                                                        "order" => "ASC",
                                        "limite" => ":offset", ":limit"
                                        ));


include_once("app/model/logement/list_logement.php");

if (isset($_GET['place'])) {


 $pays=$_GET['place'];
 $type=$_GET['type'];


if (!isset($_GET["page"]))
  $page = 1;
else {
  $page = $_GET["page"];
}
  $offset= ($page -1) * PAGINATION_LOGEMENT;



$logements = lire_logements($offset, PAGINATION_LOGEMENT, $pays, $type);
$nb_logements = counttable("logement", $options);
 
}





define("BODY_CLASS", "search");
define("PAGE_TITLE", "Liste des résultats");

include_once("app/view/logement/search.php");

?>