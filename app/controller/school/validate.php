<?php 



if(isset($_GET["userid"])) {
    include_once("app/model/school/validate.php");
    $resultat = edit_users($_GET['userid']);
 
    if ($resultat) {
      header("Location:?module=school&action=index&school=".$_SESSION['school']['school_id']."notif=ok");
    } 
    else {
      echo "nooook";
    }   
}



 

define("BODY_CLASS", "bo_accept");
define("PAGE_TITLE", "Modifier utilisateur");
include_once("app/view/school/index.php");
