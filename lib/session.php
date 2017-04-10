<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
function secu_session_start() {
  session_start();
 
    $ip = !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

    $securite = $ip.'__'.$_SERVER['HTTP_USER_AGENT'];

    if(empty($_SESSION)) {

        // ON ouvre la session et on enregistre la chaine de sécurité
        $_SESSION['securite'] = $securite;
        return true;
    }

    elseif($_SESSION['securite'] != $securite) {

        //On régnère la session et on efface tout le contenu
        session_regenerate_id();
        $_SESSION = array();
        return false;
    }
return true;
}


?>