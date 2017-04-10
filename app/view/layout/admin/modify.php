<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");?>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Accueil</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Liste <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Test</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon Profil <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Mes Messages</a></li>
            <li><a href="#">Nous Contacter</a></li>
            <li><a href="#">Modifier le Profil</a></li>
            <li role="separator" class="divider"></li>
            <li> <a href="index.php?module=user&action=logout">Déconnexion</a></li>

          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>
  <div>
  <form class="form-horizontal" action="?module=admin&action=modify" method="POST">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
    <div class="col-sm-10">
      <input name="name" type="text" class="form-control" id="inputEmail3" value="<?php echo $logement["logement_name"]?>">
    </div>

  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Taille</label>
    <div class="col-sm-10">
      <input name="height" type="text" class="form-control" id="inputPassword3" value="<?php echo $logement["logement_height"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Prix</label>
    <div class="col-sm-10">
      <input name="price" type="text" class="form-control" id="inputPassword3" value="<?php echo $logement["logement_price"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Adresse</label>
    <div class="col-sm-10">
      <input name="adresse" type="text" class="form-control" id="inputPassword3" value="<?php echo $logement["logement_adress"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Zip</label>
    <div class="col-sm-10">
      <input name="zip" type="text" class="form-control" id="inputPassword3" value="<?php echo $logement["logement_zip"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Détails</label>
    <div class="col-sm-10">
      <input name="details" type="text" class="form-control" id="inputPassword3" value="<?php echo $logement["logement_details"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Règles</label>
    <div class="col-sm-10">
      <input name="rules" type="text" class="form-control" id="inputPassword3" value="<?php echo $logement["logement_rules"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Nombre de pièces</label>
    <div class="col-sm-10">
      <input name="piece" type="text" class="form-control" id="inputPassword3" value="<?php echo $logement["logement_piece"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Info</label>
    <div class="col-sm-10">
      <input name="info" type="text" class="form-control" id="inputPassword3" value="<?php echo $logement["logement_info"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Photo</label>
    <div class="col-sm-10">
      <input name="photo" type="file" class="form-control" id="inputPassword3" value="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Catégorie</label>
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

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">User</label>
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

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Lieu</label>
    <div class="col-sm-10">
      <?php
      if (isset($_GET["user"])) {
        scrollist("location_place", $place, "place_id", "place_name", "form-control", "listuser", array("default" => "Tous les users", "selected" => $_GET["user"]));
      } else {
        scrollist("location_place", $place, "place_id", "place_name", "form-control", "listuser", array("default" => "Tous les users"));
      }
      ?>    </div>
  </div>
  <input type="hidden" name="self" value="<?php echo $logement['logement_id']?>"/>

  <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default">Modifier</button>
  </div>
</div>
</form>
<script>
$(function() {
   var x = $('#hidden').val();
   $("option[value="+x+"]").attr( "selected", "selected" );
   console.log(x);
 });
</script>
</div>

