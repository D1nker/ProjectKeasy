<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
session_destroy();
session_unset();
unset($_SESSION["school"]);

header("Location:?");
exit;