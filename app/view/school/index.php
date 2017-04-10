 <?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); ?>
 
<h1>Etudiants validés</h1>

	<?php 
foreach ($users as $cle => $user) {

?>
<div class="group">
  <h2><?=$user['user_firstname'] ." ". $user['user_lastname'];?></h2>
  <?=$user['user_age'];?>
  <?=$user['user_gender'];?>
 
</div>
<?php } ?>

<h1>Etudiants en attente</h1>

	<?php 

foreach ($userrs as $cle => $userr) {
?>
  <div class="group">
    <h2><?=$userr['user_firstname'] ." ". $userr['user_lastname'];?></h2>
    <?=$userr['user_age'];?>
    <?=$userr['user_gender'];?><br><br>
    <?= var_dump($userr['user_id']); ?>
    <a href="?module=school&action=validate&userid=<?= $userr['user_id'];?>"><button id="valid_user">Valider</button></a>
  </div>
<?php } 

 include("app/view/layout/footer.php"); ?>