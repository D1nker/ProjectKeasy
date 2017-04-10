<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
protection("user", "user", "login", USER_ADMIN);

$retour = deletetable ('comment',
                        array( "idcolumn" => "comment_id",
                                "idvalue" => $_GET["id"]));

if ($retour) {
    location("admin", "index", "&notif=ok");
}
else {
    location("admin", "index", "&notif=nok");
}
