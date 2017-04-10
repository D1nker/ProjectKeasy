<?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); 
 include("app/view/layout/user_sidebar.php") 
?>
<section>

<div class="boite">
		<div id="b1">
			<a href="?module=logement&action=new">
			<div><img src="webroot/photos/picto/plus.png"></div>
			</a>
			<a href="?module=logement&action=new">
			<div>Créer une annonce</div>
			</a>
			</a>
		</div>
		<div id="b2"><div>Liste de vos annonces publiées</div></div>
	</div>

<div class="boite2">
  <?php foreach ($logements as $cle => $logement) {
    ?>
		<div class="boxi">
			<div class="foto">
         <img class="testphoto" src="<?php echo TARGET_TOF.$logement['logement_photo']?>"/>
      </div>
			<div class="droite">
				<div class="crouage">
				   <a href="?module=logement&action=edit&id=<?php echo $logement['logement_id'];?>"> <div class="rouage"></div></a>
				</div>

				<div class="t">
					<div class="tiannonce"><?php echo $logement['logement_name'];?></div>
					<div>
						<div class="tannonce"><?php echo $logement['logement_category_type']; ?></div>
						<div class="tannonce"><?php echo $logement['logement_price']; ?></div>
						<div class="tannonce"><?php echo $logement['place_name']; ?></div>
					</div>
          
				</div>
      </div>
		</div>
  <?php } ?>
</div>
</section>
</div>
 <?php include("app/view/layout/footer.php"); ?>