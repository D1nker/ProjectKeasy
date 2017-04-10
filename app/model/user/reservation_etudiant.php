<?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); 
 include("app/view/layout/user_sidebar.php") 
?>

<section>

<div class="boite">
		<div id="b1">
			<div><img src="webroot/photos/picto/plus.png"></div>
			<div>Créer une annonce</div>
		</div>
		<div id="b2"><div>Liste de vos réservations</div></div>
	</div>

<div class="boite2">
  <?php foreach ($resas as $cle => $resa) {
    ?>
		<div class="boxi">
			<div class="foto">
         <img class="testphoto" src="<?php echo TARGET_TOF.$resa['logement_photo']?>"/>
      </div>
			<div class="droite">
				<div class="crouage">
				    <div class="rouage"></div>
				</div>

				<div class="t">
					<div class="tiannonce"><?=$resa['logement_name'];?></div>
					<div>
						<div class="tannonce"><?=$resa['user_firstname'] ." ". $resa['user_lastname'];?></div>
						<div class="tannonce"><?= $resa['place_name']. ", ".$resa['logement_category_type']; ?><br></div>
						<div class="tannonce"> Réservé du <?= $resa['reservation_date_arrive']. "du ".$resa['reservation_date_return']; ?></div>
            <div class="tannonce"><?=$resa['logement_price'];?></div>
						<div class="tannonce">
							<?php if ($resa['token_reservation'] == 1) { ?>
						<a href="?module=user&action=accept_reservation&id=<?php echo $resa['reservation_id']?>&logementId=<?php echo $resa['logement_id']?>">
							Accepter</a>
							<?php } else if ($resa['token_reservation'] == 2) { ?>
									<h2>Accepté <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i></h2>
							<?php } 
							var_dump($resas);?>

					
						</div>
					</div>
          
				</div>
      </div>
		</div>
  <?php } ?>
</div>
</section>
</div>
 <?php include("app/view/layout/footer.php"); ?>