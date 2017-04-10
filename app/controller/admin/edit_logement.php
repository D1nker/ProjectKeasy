<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
protection("user", "user", "login", USER_ADMIN);


$cat = selecttable('cat_logement', array("orderby" => "logement_category_type",
                                                       "order" => "ASC",
                                       "limite" => ":offset", ":limit"
                                       ));
$place = selecttable('location_place', array("orderby" => "place_name",

                                                       "order" => "ASC",
                                       "limite" => ":offset", ":limit"
                                       ));

$users = selecttable('user', array("orderby" => "user_firstname",
                                                     "order" => "ASC",
                                     "limite" => ":offset", ":limit"
                                     ));


if (isset($_POST['self'])) {
$photo = $_FILES['photo'];    

include ('app/model/admin/edit_logement.php');
$acceptedTypes = [
    "image/jpeg",
    "image/png",
    "application/pdf",
    "image/jpg",
];

define("APP_MAX_UPLOAD_SIZE", 1024*1024);
// controle
// repertoire cible existe et est inscriptible
if(!file_exists(TARGET_TOF) || !is_writable(TARGET_TOF)){
    echo ("Repertoire racine non existant, ou non inscriptible");
}



// erreur?
if($photo['error'] != 0){
    echo ("Erreur!");
}

// le type du fichier uploade est-il accepte?
if(!in_array($photo['type'], $acceptedTypes)){
    echo ("Content-type interdit");
}

// test de la taille du fichier
if(APP_MAX_UPLOAD_SIZE < $photo['size']){
    echo ("T'es trop gros");
}

//affiche la taille de l'image
$size = getimagesize($photo['tmp_name']);
echo "Largeur: {$size[0]} pixel<br> ";
echo "Hauteur: {$size[1]} pixel<br> ";

// fichier deja present?
if(file_exists(TARGET_TOF.$photo['name'])){
    echo ("fichier cible deja present");
}

//deplacement  fichier temporaire vers le fichier definitif
$temp = explode(".", $photo["name"]);
$ext = md5(uniqid(rand(), true));
$newfilename = $ext.'.'.end($temp);

if(file_exists(TARGET_TOF.$newfilename)){
    echo ("fichier cible deja present");
}

if(!move_uploaded_file($photo['tmp_name'], TARGET_TOF.$newfilename)){
echo ("Probleme de move_uploaded_file");
}



$logement_id = $_POST['self'];
$resultat = edit_logement($_POST, $newfilename, $logement_id);
echo($newfilename);
    if ($resultat) {
        header("Location:?module=admin&action=index&notif=ok");
    } else {
        var_dump($_POST);
        var_dump($_FILES);
  } 
}

if (isset($_GET['logementId'])) {
$options = array("wherecolumn" => "logement_id", "wherevalue" => $_GET['logementId']);
} else if (isset($_POST['self'])) {
$options = array("wherecolumn" => "logement_id", "wherevalue" => $_POST['self']);
}

$logements = selecttable('logement', $options);

foreach ($logements as $cle => $logement) {

 $logements[$cle]['logement_name'] =  $logement['logement_name'];
 $logements[$cle]['logement_height'] =  $logement['logement_height'];
 $logements[$cle]['logement_price'] =  $logement['logement_price'];
 $logements[$cle]['logement_adress'] =  $logement['logement_adress'];
 $logements[$cle]['logement_zip'] =  $logement['logement_zip'];
 $logements[$cle]['logement_rules'] =  $logement['logement_rules'];
 $logements[$cle]['logement_piece'] =  $logement['logement_piece'];
 $logements[$cle]['logement_info'] =  $logement['logement_info'];
 $logements[$cle]['logement_photo'] =  $logement['logement_photo'];
 $logements[$cle]['cat_id'] =  $logement['cat_id'];
 $logements[$cle]['logement_user_id'] =  $logement['logement_user_id'];
 $logements[$cle]['location_place_id'] =  $logement['location_place_id'];
}




define("BODY_CLASS", "bo_modify_logement");
define("PAGE_TITLE", "Modifier des logementss");
include_once("app/view/admin/edit_logement.php");