<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
?>
<h2 id="com_title">Les commentaires</h2>
<?php
  
  foreach ($comment as $com) {
      ?>
    <div class="com">
    <ul>    
        <li id="noname"><img alt="photo de la personne qui a commenté" class="photo_com" src="<?php echo TARGET_TOF.$com['user_photo'];?>"/><span><?=$com['user_lastname']. " ". $com['user_firstname'] ?></span></li>
         <li> <?=$com['comment_title']?></li>
         
         <li><?=$com['comment_date'] ?></li>
         <li>  <i>"<?=$com['comment_message'] ?>"</i></li>
    </ul>
    
    </div>  
<?php

  } ?>
