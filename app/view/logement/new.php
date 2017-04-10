<?php include("app/view/layout/header.php"); ?>
<div class="ajout_contain">
    <h1>Ajouter un logement</h1>
    <div id="form-main">
        <div id="form-div">
            <form class="form" id="form1" method="POST" action="?module=logement&action=new"  enctype="multipart/form-data">
                
                <p class="name">
                    <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Nom du logement" id="name_logement" />
                </p>

                <p class="cat">
                   <?php if (isset($_GET["user"])) {
                        scrollist("cat", $catid, "logement_cat_id", "logement_category_type", "dropdown", "listcat", array("default" => "Toutes les catégories", "selected" => $_POST["cat"])); 
                    } else {
                        scrollist("cat", $catid, "logement_cat_id", "logement_category_type", "dropdown", "listcat", array("default" => "Toutes les catégories")); 
			              }?>
                </p>
      
                <p class="place">
                   <?php if (isset($_GET["user"])) {
                        scrollist("place", $place, "place_id", "place_name", "dropdown", "listplace", array("default" => "Toutes les villes", "selected" => $_POST["place"])); 
                    } else {
                        scrollist("place", $place, "place_id", "place_name", "dropdown", "listplace", array("default" => "Toutes les villes")); 
			              } ?>
                </p>

                <p class="height">
                    <input name="height" type="text" class="validate[required,custom[email]] feedback-input"  id="height" placeholder="Taille du logement" id="height"/>
                </p>

                <p class="price">
                    <input name="price" type="text" class="validate[required,custom[email]] feedback-input" id="price" placeholder="Prix" />
                </p>

                <p class="piece">
                    <input name="piece" type="text" class="validate[required,custom[email]] feedback-input" id="piece" placeholder="Nombre de pièces" />
                </p>


                <p class="adress">
                    <input name="adress" type="text" class="validate[required,custom[email]] feedback-input" id="adress" placeholder="Rue de votre logement" />
                </p>

                <p class="zip">
                    <input name="zip" type="text" class="validate[required,custom[email]] feedback-input" id="zip" placeholder="Code postal" />
                </p>

                <p class="details">
                    <textarea name="details" class="validate[required,length[6,300]] feedback-input" id="details">Ecrivez les caractéristiques de votre logement</textarea>
                </p>

                <p class="rules">
                    <textarea name="rules" class="validate[required,length[6,300]] feedback-input" id="rules">Ecrivez les règles de votre logement</textarea>
                </p>

                <p class="photo">
                    <input type="file" name="photo" class="validate[required,length[6,300]] feedback-input" id="photo" placeholder="Parlez de vous, de vos goûts...">
                </p>
                
                <p class="info">
                    <textarea name="info" class="validate[required,length[6,300]] feedback-input" id="info"><p>Ecrivez les informations complémentaires à votre logement :&nbsp;<br></p><ul><li>Trajet depuis le métro le plus proche&nbsp;<br></li><li>Servies à proximité...</li></ul></textarea>
                </p>
     

                <div class="submit">
                    <input type="submit" value="Créer" id="button-blue"/>
                </div>
            </form>
        </div>
    </div>

    
 <script>

CKEDITOR.replace( 'details' );
CKEDITOR.replace( 'rules' );
CKEDITOR.replace( 'info' );
  
 </script>
</form>
 
</div>
</div>

 <?php include("app/view/layout/footer.php"); ?>
							