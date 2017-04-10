<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
include ('app/view/layout/admin/header.php');
?>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://rpeyret.eemi.tech/keasy/">Retour à l'accueil</a></li>
        <li>
          <a href="index.php?module=user&action=logout">Se déconnecter</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>
  <div>
  <form class="form-horizontal" action="?module=admin&action=edit_logement" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nom</label>
    <div class="col-sm-10">
      <input name="name" type="text" class="form-control"  value="<?php echo $logement["logement_name"]?>">
    </div>

  </div>

  <div class="form-group">
    <label for="height" class="col-sm-2 control-label">Taille</label>
    <div class="col-sm-10">
      <input name="height" type="text" class="form-control" value="<?php echo $logement["logement_height"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Prix</label>
    <div class="col-sm-10">
      <input name="price" type="text" class="form-control"  value="<?php echo $logement["logement_price"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for=" adress" class="col-sm-2 control-label">Adresse</label>
    <div class="col-sm-10">
      <input name="adress" type="text" class="form-control"  value="<?php echo $logement["logement_adress"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="zip" class="col-sm-2 control-label">Zip</label>
    <div class="col-sm-10">
      <input name="zip" type="text" class="form-control"  value="<?php echo $logement["logement_zip"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="details" class="col-sm-2 control-label">Détails</label>
    <div class="col-sm-10">
      <input name="details" type="text" class="form-control"  value="<?php echo $logement["logement_details"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="rules" class="col-sm-2 control-label">Règles</label>
    <div class="col-sm-10">
      <input name="rules" type="text" class="form-control" value="<?php echo $logement["logement_rules"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="piece" class="col-sm-2 control-label">Nombre de pièces</label>
    <div class="col-sm-10">
      <input name="piece" type="text" class="form-control"  value="<?php echo $logement["logement_piece"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="info" class="col-sm-2 control-label">Info</label>
    <div class="col-sm-10">
      <input name="info" type="text" class="form-control" value="<?php echo $logement["logement_info"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="photo" class="col-sm-2 control-label">Photo</label>
    <div class="col-sm-10">
      <input name="photo" type="file" class="form-control"  value="<?php echo $logement["logement_photo"]?>"/>
      <img src="<?php echo TARGET_TOF.$logement['logement_photo']?>" alt="photo principale"/>
    </div>
  </div>

  <div class="form-group">
    <label for="." class="col-sm-2 control-label">Catégorie</label>
    <div class="col-sm-10">
      <?php
      if (isset($_GET["user"])) {
        scrollist("cat_logement", $cat, "logement_cat_id", "logement_category_type", "form-control", "listcat", array("default" => "Tous les users", "selected" => $_logement["catid"]));
      } else {
        scrollist("cat_logement", $cat, "logement_cat_id", "logement_category_type", "form-control", "listcat", array("default" => "Tous les users"));
      }
      ?>
    </div>
  </div>
  <input type="hidden" id="hidden3" value="<?php echo $logement['cat_id']; ?>"/>
  <div class="form-group">
    <label for="." class="col-sm-2 control-label">User</label>
    <div class="col-sm-10">
      <?php
      if (isset($_GET["user"])) {
        scrollist("user", $users, "user_id", "user_firstname", "form-control", "listuser", array("default" => "Tous les users", "selected" => $_GET["user"]));
      } else {
        scrollist("user", $users, "user_id", "user_firstname", "form-control", "listuser", array("default" => "Tous les users"));
      }
      ?>
    </div>
  </div>
<input type="hidden" id="hidden5" value="<?php echo $logement['logement_user_id']; ?>"/>
  <div class="form-group">
    <label class="col-sm-2 control-label">Lieu</label>
    <div class="col-sm-10">
      <?php
      if (isset($_GET["user"])) {
        scrollist("location_place", $place, "place_id", "place_name", "form-control", "listplace", array("default" => "Tous les users", "selected" => $_GET["user"]));
      } else {
        scrollist("location_place", $place, "place_id", "place_name", "form-control", "listplace", array("default" => "Tous les users"));
      }
      ?>    </div>
  </div>
  <input type="hidden" id="hidden4" value="<?php echo $logement['location_place_id']; ?>"/>
  <input type="hidden" name="self" value="<?php echo $logement['logement_id']?>"/>

  <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default">Modifier</button>
  </div>
</div>
</form>
<script>
$(function() {
   var x3 = $('#hidden3').val();
   $("#listcat option[value='"+x3+"']").attr( "selected", "selected" );

   var x4 = $('#hidden4').val();
   $("#listplace option[value='"+x4+"']").attr( "selected", "selected" );

   var x5 = $('#hidden5').val();
   $("#listuser option[value='"+x5+"']").attr( "selected", "selected" );

 });
</script>
</script>
</div>
