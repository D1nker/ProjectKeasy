<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");
include 'app/view/layout/header.php'; ?>

<div class="coco2">
  <div class="wrapper2">
    <form class="inscri" method="post" action="?module=user&action=new">
		<p class="title">S'inscrire</p>	

		<label for="login"> Nom </label>
		<input type="text" name="login" maxlength="200" required/>
							
		<label for="firstname"> Prénom </label>
		<input type="text" name="firstname" maxlength="200" placeholder="Prénom" required/>
							
		<label for="mdp"> Mot de passe </label>
		<input type="password" name="mdp" maxlength="200" required/>
						
		<label for="email"> E-mail </label>
		<input  name="email" type="text" required> </textarea>
						
		<label for="age"> Age </label>
		<input type="text" name="age" maxlength="200" placeholder="Age" required/>
		<label for="genre"> Genre </label>

		F<input type="checkbox" name="genre" value="F"/>
		M<input type="checkbox" name="genre" value="M"/>
							
		<label for="phone"> Téléphone </label>
		<input type="text" name="phone" maxlength="200" placeholder="Téléphone" required/>
							
		<label for="descri">Description</label>
		<input type="text" name="descri" maxlength="200" placeholder="Description" required/>
							
		<label for="catid">Categorie</label>
		<?php 
            if (isset($_GET["user"])) {
              scrollist("catid", $catid, "user_cat_id", "user_category_type", "dropdown", "listcat", array("default" => "Toutes les catégories", "selected" => $_POST["catid"])); 
            } else {
              scrollist("catid", $catid, "user_cat_id", "user_category_type", "dropdown", "listcat", array("default" => "Toutes les catégories")); 
			  
            }
         ?>	
		<input type="submit" value="Enregistrer" /> <input type="reset" name="Effacer" value="Effacer" />
	</form>		
  </div>
</div>

<?php 
include 'app/view/layout/footer.php'; ?>