 <?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php");
?>

<section>
<div  id="bus">

	<div id="bandeau"><div>Bienvenue sur votre espace d'administration<h1><?php echo $_SESSION['school']['school_name'];?></h1>, choisissez l'action que vous souhaitez réaliser.</div></div>
	<div id="conteneurcarre">
		<div class="carre1">
			<div class="centre">
				<div><img class="ogol" src="webroot/photos/ok-mark.png"></div>
				<div class="titre">Confirmation d'appartenance</div>
				<div class="explication">I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. </div>
			</div>
		</div>
		<div class="carre2">
			<div class="centre">
				<div><img class="ogol" src="webroot/photos/houses.png"></div>
				<div class="titre">Recomandations de logements</div>
				<div class="explication">I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. </div>
			</div>
		</div>

	</div>

</div>
</section>

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