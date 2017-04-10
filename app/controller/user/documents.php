<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
protection("user", "user", "login", USER_LAMBDA);


if(isset($_POST["nom_certif"])) {

  


$acceptedTypes = [
    "image/jpeg",
    "image/png",
    "application/pdf",
    "image/jpg",
];

define("APP_MAX_UPLOAD_SIZE", 1024*1024);
// controle
// repertoire cible existe et est inscriptible
if(!file_exists(TARGET_DIR) || !is_writable(TARGET_DIR)){
    echo ("Repertoire racine non existant, ou non inscriptible");
}

$certif = $_FILES['certif'];

// erreur?
if($certif['error'] != 0){
    echo ("Erreur!");
}

// le type du fichier uploade est-il accepte?
if(!in_array($certif['type'], $acceptedTypes)){
    echo ("Content-type interdit");
    
}

// test de la taille du fichier
if(APP_MAX_UPLOAD_SIZE < $certif['size']){
    echo ("T'es trop gros");
}

//affiche la taille de l'image
$size = getimagesize($certif['tmp_name']);
echo "Largeur: {$size[0]} pixel<br> ";
echo "Hauteur: {$size[1]} pixel<br> ";

// fichier deja present?
if(file_exists(TARGET_DIR.$certif['name'])){
    echo ("fichier cible deja present");
}

//deplacement  fichier temporaire vers le fichier definitif
$temp = explode(".", $certif["name"]);
$newfilename = $_POST['nom_certif'].'.'.end($temp);

if(file_exists(TARGET_DIR.$newfilename)){
    echo ("fichier cible deja present");
}

if(!move_uploaded_file($certif['tmp_name'], TARGET_DIR.$newfilename)){
echo ("Probleme de move_uploaded_file");
}

if (!in_array($certif['type'], $acceptedTypes)) {
       header("Location:?module=user&action=documents&notif=nok");
  }
  else if (in_array($certif['type'], $acceptedTypes)) {
    include_once('app/model/user/doc_user.php');
    $resultat = inserer_doc($newfilename,  $_SESSION['user']['user_id']);
        
        if ($resultat) {
            var_dump($certif);
        } else {
            header("Location:?module=user&action=documents&notif=nok");
        }
    }   
}

 include_once('app/model/user/lire_doc.php');
$names = lire_doc($_SESSION['user']['user_id']);





define("BODY_CLASS", "document");
define("PAGE_TITLE", "Modifier utilisateur");
include_once("app/view/user/documents.php");