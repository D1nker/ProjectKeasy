<?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); 
 include("app/view/layout/user_sidebar.php") ?>
<div class="ajout_doc">

<h3 class="title">Vos Documents</h3>
<p class="title-info"></p>

<div class="client dark">

		<h2 class="heading">Certificat de scolarité</h2>
		
            <?php if ($names){
                foreach ($names as $name) { ?>
                    <p class="info">
                    <img src="<?php echo TARGET_DIR.$name['user_certificate_school'] ?>"/>
                    </p>
            <?php } }
                else {
                 echo "<p></p>";
                 } ?>     
</div>

<div class="client dark">
    <h2 class="heading">Upload votre certifciat de scolarité</h2>
    <p class="info">
        <form id="form_doc" method="post" action="?module=user&action=documents" enctype="multipart/form-data">
            <label for="certif"> Description</label>
            <input type="text" id="name_file" name="nom_certif" placeholder="Nom du fichier">
		    <input type="file" name="certif"><br>
            <input id="okdoc" type="submit" value="Enregistrer" /> <input type="reset" name="Effacer" value="Effacer" />
        </form>
        <script>

var okdoc = document.getElementById('okdoc');

okdoc.onclick = function () {
    var doc = document.getElementById('form_doc');
    var secu = document.getElementById('name_file');
  
    if (secu.value == "") {
      event.preventDefault();
      console.log('test');
      secu.style.borderColor = "red";
      secu.style.color = "red";
      secu.value = "Veuillez entrez un nom de fichier";
  }
}
</script>
</div>
</div>
</div>
</div>
<?php include('app/view/layout/footer.php'); ?>