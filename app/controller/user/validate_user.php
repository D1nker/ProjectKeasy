<?php 

if (isset($_GET["key"])) {
    include("app/model/user/update_user.php");
    $retour = update_user($_GET["key"]);
    if($retour) {
        location("logement", "index", "notif=validate_ok");
    }
    else {
        define("PAGE_TITLE", "Validation du compte");
        include("app/view/user/novalidate.php");
    }
}
else {
     location(DEFAULT_MODULE, DEFAULT_ACTION, "notif=validate_nok");
}