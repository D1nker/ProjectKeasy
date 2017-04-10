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
      <h1>Modifier un commentaire</h1>
  <form class="form-horizontal" action="?module=admin&action=edit_com" method="POST">

  <input type="hidden" name="id" value="<?php echo $com['comment_id'];?>"/>
  <div class="form-group">
    <label for="cdate" class="col-sm-2 control-label">Date</label>
    <div class="col-sm-10">
      <input name="cdate" type="datetime" class="form-control" value="<?php echo $com['comment_date']?>">
    </div>
  </div>


  <div class="form-group">
    <label for="message" class="col-sm-2 control-label">Commentaire</label>
    <div class="col-sm-10">
      <input name="message" type="text" class="form-control" value="<?php echo $com["comment_message"]?>">
    </div>
  </div>

   <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Titre</label>
    <div class="col-sm-10">
      <input name="title" type="text" class="form-control" value="<?php echo $com["comment_title"]?>">
    </div>
    </div>

    <div class="form-group">
    <label for="user" class="col-sm-2 control-label">User</label>
    <div class="col-sm-10">


    <?php
        if (isset($_GET["user"])) {
            scrollist("user", $users, "user_id", "user_mail", "form-control", "listuser", array("default" => "Tous les users", "selected" => $_GET["user"]));
        } else {
            scrollist("user", $users, "user_id", "user_mail", "form-control", "listuser", array("default" => "Tous les users"));
        }
    ?>
 </div>
 </div>
<input type="hidden" id="hidden" value="<?php echo $com['comment_user_id']?>"/>
     <div class="form-group">
    <label for="logement" class="col-sm-2 control-label">Logement associé</label>
    <div class="col-sm-10">


    <?php
        if (isset($_GET["user"])) {
            scrollist("logement", $logements, "logement_id", "logement_name", "form-control", "listlogement", array("default" => "Tous les logements", "selected" => $com['comment_logement_id']));
        } else {
            scrollist("logement", $logements, "logement_id", "logement_name", "form-control", "listlogement", array("default" => "Tous les logements"));
        }
    ?>
 </div>
 </div>
 <input type="hidden" id="hidden2" value="<?php echo $com['comment_logement_id']?>"/>

  <input class="btn btn-primary" type="submit" value="Submit">

  </form>
</div>
<script>

$(function() {
   var x = $('#hidden').val();
   $("#listuser option[value='"+x+"']").attr( "selected", "selected" );
   console.log(x);
   var x2 = $('#hidden2').val();
   $("#listlogement option[value='"+x2+"']").attr( "selected", "selected" );
   console.log(x2);
 });
</script>
