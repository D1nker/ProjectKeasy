<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");


$cat = selecttable('cat_user', array("orderby" => "user_category_type",
                                                       "order" => "ASC",
                                       "limite" => ":offset", ":limit"
                                       ));
$school = selecttable('school', array("orderby" => "school_name",

                                                       "order" => "ASC",
                                       "limite" => ":offset", ":limit"
                                       ));

if (isset($_POST['self'])) {
$photo = $_FILES['photo'];

include ('app/model/admin/edit_users.php');
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



$user_id = $_GET['id'];
$resultat = edit_user($_POST, $newfilename, $user_id);
echo($newfilename);
    if ($resultat) {
        header("Location:?module=admin&action=index&notif=ok");
    } else {
        var_dump($_POST);
        var_dump($_FILES);
  }
}

if (isset($_GET['userId'])) {
$options = array("wherecolumn" => "user_id", "wherevalue" => $_GET['userId']);
} else if (isset($_GET['id'])) {
$options = array("wherecolumn" => "user_id", "wherevalue" => $_GET['id']);
}

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
 $users[$cle]['token'] =  $user['token'];
 $users[$cle]['cat_user_id'] =  $user['cat_user_id'];
 $users[$cle]['school_school_id'] =  $user['school_school_id'];


}



define("BODY_CLASS", "bo_modify_user");
define("PAGE_TITLE", "Modifier des utilisateurs");
include_once("app/view/admin/edit_user.php");
