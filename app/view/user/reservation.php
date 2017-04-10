<?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); 
 include("app/view/layout/user_sidebar.php") 
?>

<section>

<div class="boite">
		
		<div id="b2"><div><h1>Liste de vos réservations</h1></div></div>
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
						<div class="tannonce"> Réservé du <?= $resa['reservation_date_arrive']. " au ".$resa['reservation_date_return']; ?></div>
            <div class="tannonce"><?=$resa['logement_price'];?>€</div>
						
					</div>
          
				</div>
      </div>
		</div>
  <?php } ?>
</div>
</section>
</div>
 <?php include("app/view/layout/footer.php"); ?>
