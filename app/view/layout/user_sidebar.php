<div class="container">
<div class="sidebar">
    <p><?php echo $_SESSION['user']['user_lastname']." ".$_SESSION['user']['user_firstname']; ?></p>
    <img id="photoProfil" src="<?php echo TARGET_TOF.$_SESSION['user']['user_photo']?>" alt="photo de profil"/>
    <ul>
   
        <li><a href="?module=user&action=index">Mes informations</a></li>
        <li><a href="?module=user&action=documents">Mes documents</a></li>
         <?php if ($_SESSION["user"]["cat_user_id"] == 1) { ?>
        <li><a href="?module=user&action=reservation">Mes réservations</a></li>
       <?php } 
        else if ($_SESSION["user"]["cat_user_id"] == 2) { ?>
            <li><a href="?module=user&action=logement">Mes logements</a></li>
             <li><a href="index.php?module=user&action=validate_reservation">Liste des réservations  </a></li>
        <?php } ?>
        
    </ul>
</div>