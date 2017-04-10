<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
try
{
	$dns = 'mysql:host=localhost;port=3306;dbname=rpeyret_keasy';
	$utilisateur = 'rpeyret';
	$mdp = 'q9AKc9HB5X';
	
	$options = array (
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	$pdo = new PDO ($dns, $utilisateur, $mdp, $options);
}
catch (Exeption $e)
{
	die("Connection à MySQL impossible : " . $e->getMessage());
}

?>
