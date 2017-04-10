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
  <form class="form-horizontal" action="?module=admin&action=edit_user" method="POST"  enctype="multipart/form-data">

    <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Nom</label>
      <div class="col-sm-10">
        <input name="lastname" type="text" class="form-control"  value="<?php echo $user["user_firstname"]?>">
      </div>
    </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">Prénom</label>
    <div class="col-sm-10">
      <input name="firstname" type="text" class="form-control"  value="<?php echo $user["user_lastname"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="mail" class="col-sm-2 control-label">Adresse Mail</label>
    <div class="col-sm-10">
      <input name="mail" type="text" class="form-control" value="<?php echo $user["user_mail"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Mot de passe</label>
    <div class="col-sm-10">
      <input name="password" type="password" class="form-control"  value="<?php echo $user["user_password"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="nationality" class="col-sm-2 control-label">Nationalité</label>
    <div class="col-sm-10">
      <input name="nationality" type="text" class="form-control"  value="<?php echo $user["user_nationality"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="age" class="col-sm-2 control-label">Age</label>
    <div class="col-sm-10">
      <input name="age" type="text" class="form-control"  value="<?php echo $user["user_age"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="gender" class="col-sm-2 control-label">Sexe</label>
    <div class="col-sm-10">
      <input name="gender" type="text" class="form-control"  value="<?php echo $user["user_gender"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="numero" class="col-sm-2 control-label">Numéro de téléphone</label>
    <div class="col-sm-10">
      <input name="numero" type="text" class="form-control" value="<?php echo $user["user_phone_number"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="descr" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input name="descr" type="text" class="form-control"  value="<?php echo $user["user_description"]?>">
    </div>
  </div>

  <div class="form-group">
    <label for="photo" class="col-sm-2 control-label">Photo</label>
    <div class="col-sm-10">
      <input name="photo" type="file" class="form-control"  value="<?php echo $user["user_photo"]?>"/>
      <img src="<?php echo TARGET_TOF.$user['user_photo']?>" alt="photo principale"/>
    </div>
  </div>

  <div class="form-group">
    <label for="cat_user" class="col-sm-2 control-label">Catégorie</label>
    <input type="hidden" id="hidden4" value="<?php echo $user['cat_user_id']; ?>"/>

    <div class="col-sm-10">
      <?php
      if (isset($_GET["user"])) {
        scrollist("cat_user", $cat, "user_cat_id", "user_category_type", "form-control", "listcat", array("default" => "Tous les users", "selected" => $_user["catid"]));
      } else {
        scrollist("cat_user", $cat, "user_cat_id", "user_category_type", "form-control", "listcat", array("default" => "Tous les users"));
      }
      ?>
    </div>
  </div>
  <div class="form-group">
    <label for="token" class="col-sm-2 control-label">Token</label>
    <div class="col-sm-10">
      <select name="token" id="token">
      <option value="0">0</option>
      <option value="1">1</option>
    </select>
  </div>
</div>

  <input type="hidden" id="hidden3" value="<?php echo $user['token']; ?>"/>
  <div class="form-group">
    <label for="school" class="col-sm-2 control-label">Ecole</label>
    <div class="col-sm-10">
      <?php
      if (isset($_GET["user"])) {
        scrollist("school", $school, "school_id", "school_name", "form-control", "listschool", array("default" => "Toutes les écoles", "selected" => $_GET["user"]));
      } else {
        scrollist("school", $school, "school_id", "school_name", "form-control", "listschool", array("default" => "Toutes les écoles"));
      }
      ?>    </div>
  </div>
  <input type="hidden" id="hidden5" value="<?php echo $user['school_school_id']; ?>"/>
  <input type="hidden" name="self" value="<?php echo $user['user_id']?>"/>

  <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default">Modifier</button>
  </div>
</div>
</form>
<script>
$(function() {
   var x3 = $('#hidden3').val();
   $("#token option[value='"+x3+"']").attr( "selected", "selected" );

   var x4 = $('#hidden4').val();
   $("#listcat option[value='"+x4+"']").attr( "selected", "selected" );

   var x5 = $('#hidden5').val();
   $("#listschool option[value='"+x5+"']").attr( "selected", "selected" );

 });
</script>
</div>
