<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");

if (!isset($_POST["mail"])) {

    define("PAGE_TITLE", "Connexion");
    define("BODY_CLASS", "connexion");

    include_once("app/view/user/login.php");

} else {

    $_POST["mdp"] = md5($_POST["mdp"] . SALT);
    include_once("app/model/user/verif_login.php");
    $return = verif_login($_POST);
    


    if(!$return) {

        header("Location:?module=user&action=login&notif=nok");
        exit;

    } else {

        $_SESSION["user"] = $return;

        if($return["user_id"] == 1) {

            $_SESSION["level"] = USER_ADMIN;
            header("Location:?module=admin&action=index");
            exit;

        } else {

            $_SESSION["level"] = USER_LAMBDA;
            header("Location:?module=logement&action=index");
            exit;

        }

        header("Location:?module=logement&action=index");
        exit;

    }

}
