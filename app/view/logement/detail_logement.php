<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
 include 'app/view/layout/header.php'; ?>

<div class="detail_logement">
  <div class="haut">
  <div id="testphoto" style="background-image: url('<?php echo $repertoire.$detail['logement_photo'];?>')">
  </div>
  <div id="photo_display">
    <?php foreach ($photos as $photo) {?>
    <img src="<?php echo TARGET_TOF.$photo['photo']?>" alt="photos du logements" id="image<?php echo $photo['photos_ordre']?>"/>
    <?php } ?>
  </div>
  </div>
  <div class="detail_content">
    <div class="detail_left">
      
      <h1><?=$detail['logement_name']?></h1>
      <p><?=$detail['place_name']. ", " .$detail['logement_category_type']. ", ".$detail['logement_height']?></p>
      <p><?=$detail['logement_piece']?> pièces</p>
      <p><?=$detail['logement_adress']. " ".$detail['logement_zip']?> </p>
      <p><b>Détail :</b></p>
      <p><?=$detail['logement_details']?></p>
      <p><b>Règles :</b></p> 
      <p><?=$detail['logement_rules']?></p>
      <p><b>Informations complémentaires :</b></p>
      <p><?=$detail['logement_info']?></p>
       <input type="hidden"  id="address" value="<?=$detail['logement_adress']. " ".$detail['logement_zip']?>"/>
       
  <div id="map"></div>
    </div>
    <div class="detail_right">
      <div class="pricing pricing--pema">
	      <div class="pricing__item">
		 			<img alt="photo du propriétaire" src="<?php echo TARGET_TOF.$detail['user_photo'];?>">
           <h3 class="pricing__title"><?=$detail['logement_name']?></h3>
           <p class="pricing__sentence"><?=$detail['user_lastname']. " " . $detail['user_firstname']?></p>
           <div class="pricing__price"><span class="pricing__currency">€</span><?=$detail['logement_price']?><span class="pricing__period">/ mois</span></div>
            <?php if ($detail['logement_dispo'] > 0) {
                      echo "<i class='fa fa-exclamation-triangle  fa-3x' aria-hidden='true'></i><div class='alert'> Ce logement n'est plus disponible, un autre étudiant a été plus rapide...</div>";
                    }
                    else if ($detail['logement_dispo'] == 0) {
            ?>
            
        <form method="POST" action="?module=logement&action=reservation&id=<?php echo $detail['logement_id'];?>">
           <div class="pricing__date">
						        <label>Du... </label>
                      <input type="date" name="dateA"/><br>
                    <label>Au... </label>
						          <input type="date" name="dateR"/>
           </div>
						<ul class="pricing__feature-list">
              <li class="pricing__feature">
							  <span class="icon icon--chart-bars">
								  <i class="fa fa-home" aria-hidden="true"></i>
							  </span>
							  <?= $detail['logement_category_type']; ?>
						   </li>
               <li class="pricing__feature">
							  <span class="icon icon--bubble">
								  <i class="fa fa-map-marker" aria-hidden="true"></i>
							  </span>
							  <?=$detail['place_name'];?>
						   </li>
               <li class="pricing__feature">
							   <span class="icon icon--rocket">
								   <i class="fa fa-envelope-o" aria-hidden="true"></i>
							   </span><a href="mailto:<?= $detail['user_mail'];?>">Contacter l'hôte</a>
						   </li>
            </ul>
					<?php if (!isset($_SESSION['user']['cat_user_id'])) { ?>
          </form>
       			    <p>Veuillez vous connecter pour effectuer une réservation</p>
      				<?php }
      					  else if ($_SESSION['user']['cat_user_id'] == 1) { ?>
        		<button type="submit" class="pricing__action">Réserver</button>
              </form>
     				<?php } ?>
          <?php } ?>
        	</div>
          <?php include('app/view/commentaire/commentaire.php'); ?>
    </div>
    
 </div>
</div>
<script src="webroot/js/map.js"></script>
<script src="webroot/js/slide.js"></script>
</div>


<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqKzX_YOyelIi7cGrmHcWkkxTwypwJWvo&callback=initMap">
</script>
<?php include ('app/view/layout/footer.php'); ?>

