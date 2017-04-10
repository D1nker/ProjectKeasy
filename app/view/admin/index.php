<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");?>

<!DOCTYPE html>
<html lang="<?php echo PAGE_LANG; ?>">
<head>
    <meta charset="<?php echo PAGE_CHARSET ?>">
    <title><?php echo PAGE_TITLE; ?></title>
    <link rel="stylesheet" type="text/css" href="webroot/css/global.css" >
     <script type="text/javascript" src="webroot/js/jquery-3.2.0.js"></script>
    <link rel="stylesheet" type="text/css" href="webroot/css/bootstrap.css" >
    <script src="webroot/js/bootstrap.js"></script>



</head>
<body>
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
<div class="BO">
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="<?php if(!isset($_GET['tab'])){echo 'active';}?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Liste des logements</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Liste des utilisateurs</a></li>
            <li role="presentation" class="<?php if(isset($_GET['tab']) && $_GET['tab'] == 'com') {echo 'active';} ?>"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Gérer les commentaires</a></li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane <?php if(!isset($_GET['tab'])){echo 'active';}?>" id="home"><?php include ('app/view/admin/logements.php');?></div>
            <div role="tabpanel" class="tab-pane" id="profile"><?php include('app/view/admin/users.php');?></div>
            <div role="tabpanel" class="tab-pane <?php if(isset($_GET['tab']) && $_GET['tab'] == 'com') {echo 'active';} ?>" id="messages"><?php include('app/view/admin/commentaires.php');?></div>

        </div>

    </div>
</div>
</body>
