<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
protection("user", "user", "index", USER_LAMBDA);


$catid = selecttable('cat_logement', array("orderby" => "logement_category_type",
                                                        "order" => "ASC",
                                        "limite" => ":offset", ":limit"
                                        ));
$place = selecttable('location_place', array("orderby" => "place_name",

                                                        "order" => "ASC",
                                        "limite" => ":offset", ":limit"
                                        ));

if ($_SESSION['user']['cat_user_id'] == 2 && isset($_POST['name'])) {

include_once('app/model/logement/new_logement.php');
$user_id =  $_SESSION["user"]["user_id"];
$photo = $_FILES['photo'];    
$targetDir = TARGET_TOF;

$acceptedTypes = [
    "image/jpeg",
    "image/png",
    "application/pdf",
    "image/jpg",
];

define("APP_MAX_UPLOAD_SIZE", 1024*1024);
// controle
// repertoire cible existe et est inscriptible
if(!file_exists($targetDir) || !is_writable($targetDir)){
    echo ("Repertoire racine non existant, ou non inscriptible");
}

if (!empty($_FILES['photo'])) {
$photo = $_FILES['photo'];

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
if(file_exists($targetDir.$photo['name'])){
    echo ("fichier cible deja present");
}

//deplacement  fichier temporaire vers le fichier definitif
$temp = explode(".", $photo["name"]);
$ext = md5(uniqid(rand(), true));
$newfilename = $ext.'.'.end($temp);

if(file_exists($targetDir.$newfilename)){
    echo ("fichier cible deja present");
}

if(!move_uploaded_file($photo['tmp_name'], $targetDir.$newfilename)){
echo ("Probleme de move_uploaded_file");
}
}
 
    $resultat = new_logement($_POST, $newfilename, $user_id);

    if ($resultat) {
       header("Location:?module=logement&action=photos&id=".$resultat);
       echo "ok";
      
    } else {
        header("Location:?module=user&action=logement&notif=nok");
  }   
}


define("BODY_CLASS", "new_logement");
define("PAGE_TITLE", "Ajouter une nouvelle annonce");
include_once("app/view/logement/new.php");