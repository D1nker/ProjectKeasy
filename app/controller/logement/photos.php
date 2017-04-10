<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
protection("user", "user", "login", USER_LAMBDA);
define("APP_MAX_UPLOAD_SIZE", 1024*1024);

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
           
        }
         echo $i;
    }

    return $file_ary;
    return $i;
}






if(isset($_POST["name"]) && isset($_GET['id']))
{
    
    $logement = $_GET['id'];
    $img = $_FILES['photo'];
    $img_desc = reArrayFiles($img);
    $i = 1;
    
    foreach($img_desc as $val)
    {
       
        include_once('app/model/logement/add_photos.php');
       
          
        $targetDir = TARGET_TOF;

        $acceptedTypes = [
        "image/jpeg",
        "image/png",
        "application/pdf",
        "image/jpg",
        ];


// controle
// repertoire cible existe et est inscriptible
if(!file_exists($targetDir) || !is_writable($targetDir)){
    echo ("Repertoire racine non existant, ou non inscriptible");
}




// erreur?
if($val['error'] != 0){
    echo ("Erreur!");
}

// le type du fichier uploade est-il accepte?
if(!in_array($val['type'], $acceptedTypes)){
    echo ("Content-type interdit");
}

// test de la taille du fichier
if(APP_MAX_UPLOAD_SIZE < $val['size']){
    echo ("T'es trop gros");
}

//affiche la taille de l'image
$size = getimagesize($val['tmp_name']);
echo "Largeur: {$size[0]} pixel<br> ";
echo "Hauteur: {$size[1]} pixel<br> ";

// fichier deja present?
if(file_exists($targetDir.$val['name'])){
    echo ("fichier cible deja present");
}

//deplacement  fichier temporaire vers le fichier definitif
$temp = explode(".", $val["name"]);
$ext = md5(uniqid(rand(), true));

$newfilename = $ext.'.'.end($temp);

if(file_exists($targetDir.$newfilename)){
    echo ("fichier cible deja present");
}

if(!move_uploaded_file($val['tmp_name'], $targetDir.$newfilename)){
echo ("Probleme de move_uploaded_file");
}
var_dump($val);
echo ($newfilename);


$i++;

 $resultat = add_photos($i, $logement, $newfilename);
}


    if ($resultat) {
      header("Location:?module=user&action=logement&notif=ok");
    } else {
        header("Location:?module=logement&action=photos&id=".$logement."&notif=nok");
  }   
}
    
 


 



define("BODY_CLASS", "new_photos");
define("PAGE_TITLE", "Ajouter des photos");
include_once("app/view/logement/new_photo.php");