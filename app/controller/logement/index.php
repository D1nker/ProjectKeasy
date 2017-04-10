<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");


$place = selecttable('location_place', array("orderby" => "place_name",
                                                        "order" => "ASC",
                                        "limite" => ":offset", ":limit"
                                        ));
$types = selecttable('cat_logement', array("orderby" => "logement_category_type",
                                                        "order" => "ASC",
                                        "limite" => ":offset", ":limit"
                                        ));
$catid = selecttable('cat_user', array("orderby" => "user_category_type",
                                                        "order" => "ASC",
                                        "limite" => ":offset", ":limit"
                                        ));


define("BODY_CLASS", "logements");
define("PAGE_TITLE", "Liste des logements");
include_once("app/view/logement/index.php");





