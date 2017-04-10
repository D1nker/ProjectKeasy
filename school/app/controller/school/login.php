<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");

if (!isset($_POST["mail"])) {

    define("PAGE_TITLE", "Connexion pour les écoles");
    define("BODY_CLASS", "BO_school");

    include_once("app/view/school/login.php");

} else {


    $_POST["mdp"] = md5($_POST["mdp"] . SALT);
    include_once("app/model/school/verif_login.php");
    $return = verif_login($_POST);
    


    if(!$return) {

        header("Location:?module=school&action=login&notif=nok");
        exit;

    } else {

        $_SESSION["school"] = $return;
        $_SESSION["level"] = USER_SCHOOL;


        header("Location:?module=school&action=index&school=". $_SESSION['school']['school_id']);
        exit;

    }
    
}
