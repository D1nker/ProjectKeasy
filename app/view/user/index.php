 <?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); 
 include("app/view/layout/user_sidebar.php");
 ?>
<div id="user_content">
     <div id="profil">
        <h1>Mon Profil</h1>
        <div id="modifier"><a href="?module=user&action=edit">Modifier mon Profil</a></div>
	 </div>


        <div id="description">
          
          <div><p><?php echo $user['user_lastname']?></p></div>
          <div><p><?php echo $user['user_firstname']?></p></div>
		   <div><p><?php echo $user['user_nationality']?></p></div>
          <div><p><?php echo $user['user_age']?></p></div>
          <div><p><?php echo $user['user_gender']?></p></div>
          <div><p><?php echo $user['user_phone_number']?></p></div>
		   <div><p><?php echo $user['user_description']?></p></div>
           <div><img src="<?php echo TARGET_TOF.$user['user_photo']?>"></div>
		   <?php if ($_SESSION['user']['cat_user_id'] == 1 && $user['school_token'] == 1) { ?>
         <div><p> <h2>Statut<i class="fa fa-check-circle fa-2x" aria-hidden="true"></i></h2></p></div>
		   <?php } else if ($_SESSION['user']['cat_user_id'] == 1 && $user['school_token'] == 0){ ?>
        <div><p>Vous devez saisir votre école dans l'onglet modifier mon profil afin de pouvoir profiter pleinement des fonctionnalités du site</p></div>
       <?php } ?>
        </div>

</div>
	
</div>
<?php 
include 'app/view/layout/footer.php'; ?>
 


