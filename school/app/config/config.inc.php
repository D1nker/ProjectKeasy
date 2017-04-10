<?php 

if(!defined("_BASE_URL")) die("Ressource interdite !");
define("PAGE_LANG", 'fr');
define("PAGE_CHARSET", 'utf-8');


define("DEFAULT_MODULE", 'school');
define("DEFAULT_ACTION", 'index');
define("PAGINATION_LOGEMENT", 3);
define("PAGINATION_COMMENTS", 4);
define("PAGINATION_USERS", 4);


// Config user
define("USER_SCHOOL", 3);
define("USER_ADMIN", 2);
define("USER_LAMBDA", 1);

define("SALT", "romzeer!");

define("ENV", "DEV");

define("TARGET_DIR", "webroot/upload_certif/");
define("TARGET_TOF", "webroot/photos/");

define("MAIL_EXPEDITEUR", "romain.peyret1@gmail.com");
define("NOM_EXPEDITEUR", "Mon super blog");