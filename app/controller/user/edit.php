<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
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
  $users[$cle]['user_photo'] =  $user['user_photo'];
 
}
if(isset($_POST["lastname"])) {
   

$target = "webroot/photos/";
  $photo = $_FILES['photo'];    
 

  $acceptedTypes = [
    "image/jpeg",
    "image/png",
    "image/jpg",
  ];

  define("APP_MAX_UPLOAD_SIZE", 1024*1024);
// controle
// repertoire cible existe et est inscriptible

  if(!file_exists($target) || !is_writable($target)){
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


    if(file_exists($target.$photo['name'])){
      echo ("fichier cible deja present");
    }

//deplacement  fichier temporaire vers le fichier definitif
$temp = explode(".", $photo["name"]);
 $ext = md5(uniqid(rand(), true));

$newfilename = $ext.'.'.end($temp);

if(!move_uploaded_file($photo['tmp_name'], $target.$newfilename)){
 
  echo ('probleme');
  header("Location:?module=user&action=edit&notif=nok");
  
  include_once('app/model/user/edit_user.php');
  $user_id =  $_SESSION["user"]["user_id"];
  $resultat = edit_user($_POST, $user['user_photo'], $user_id);
    
  if ($resultat) {
    header("Location:?module=user&action=index&notif=ok");
  
  } else {
    var_dump($_POST);
    header("Location:?module=user&action=edit&notif=nok");
  } 
  die;
}

    include_once('app/model/user/edit_user.php');
  $user_id =  $_SESSION["user"]["user_id"];
  $resultat = edit_user($_POST, $newfilename, $user_id);
    
  if ($resultat) {
    header("Location:?module=user&action=index&notif=ok");
  
  } else {
    var_dump($_POST);
    header("Location:?module=user&action=edit&notif=nok");
  } 

}








define("BODY_CLASS", "modify_user");
define("PAGE_TITLE", "Modifier utilisateur");
include_once("app/view/user/edit.php");