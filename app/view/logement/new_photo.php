<?php include("app/view/layout/header.php"); ?>

  <div class="wrapper">
    <form class="formLogement" method="post" action="?module=logement&action=photos&id=<?php echo $_GET['id']?>" enctype="multipart/form-data">
    
      <input type="text" name="name"/>
      <input id="filePhoto" type="file" multiple name="photo[]"/>
      <button type="submit">Créer</button>	
        
	</form>	
      
 </div>

<?php include("app/view/layout/footer.php"); ?>