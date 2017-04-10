<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");

if (isset($_GET['id'])) {


    $id=$_GET['id'];
    include_once("app/model/logement/detail_logement.php");
    $detail = read_logement($id);

    include_once("app/model/logement/list_comment.php");
    $comment = lire_comm($_GET["id"]);

    include_once("app/model/logement/photo_logement.php");
    $photos = read_photos($id);
   foreach ($photos as $cle => $photo) {

 $photos[$cle]['photo'] =  $photo['photo'];
 $photos[$cle]['photos_ordre'] =  $photo['photos_ordre'];
   }


    $repertoire = "webroot/photos/";

    define("BODY_CLASS", "detail");
    define("PAGE_TITLE", "Détail d'un logement");
    include_once("app/view/logement/detail_logement.php");

}
else {
    include_once('app/view/404.php');
}
