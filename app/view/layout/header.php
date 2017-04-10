
 <?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
?>
<!DOCTYPE html>
<html lang="<?php echo PAGE_LANG; ?>">
<head>
  <meta charset="<?php echo PAGE_CHARSET ?>">
  <title><?php echo PAGE_TITLE; ?></title>

  <link rel="stylesheet" href="webroot/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="webroot/css/global.css" >
  <link rel="icon" type="image/png" href="webroot/photos/flavicon.png">
   <script src="webroot/js/ckeditor/ckeditor.js"></script>
   <script src="webroot/js/jquery-3.2.0.js"></script>
   <script src="webroot/js/classie.js"></script>
   <script src="webroot/js/modernizr.custom.js"></script>



</head>
<body class="<?php echo BODY_CLASS; ?>">
  <div class="fil" id="fil">
    <button type="button" id="overlay-close">Close</button>
  </div>
<div class="overlay overlay-door">

			<button type="button" class="overlay-close">Close</button>
			<nav id="full_list">
				<ul>
			<li><img src="webroot/photos/picto/logo.svg" alt="picto keasy"/></li>
      <li><a href="?module=logement&action=index">Accueil</a></li>
      <li><a href="?module=user&action=index">Mon profil</a></li>
      <li><a href="?module=logement&action=search">Chercher un logement</a></li>
      <li><a href="?module=logement&action=new">Publier une annonce</a></li>
      <li><a href="?module=messenger&action=contact_us">Contactez-nous</a></li>
      <li><a href="?module=display&action=concept">Notre concept</a></li>
      <li><a href="?module=display&action=faq">FAQ</a></li>

				</ul>
			</nav>
	</div>


 <header>
   <div class="header">

      <a href="?module=logement&action=index"><img class="logo" src="webroot/photos/picto/logo.svg" alt="logo de keasy" /></a>
      <div id="center_menu">
        <div>
           <a href="?module=display&action=concept">Notre concept</a>
         </div>
        <div>
         </div>
       <?php if (!isset($_SESSION['user'])) { ?>
       <div>
           <a href="#" id="inscriptionOn">Inscription</a>
         </div>

        </div>
         <div>
           <a id="connexionOn" href="#">Connexion</a>
         </div>


       <?php }

         else if (isset($_SESSION['user'])){
            if ($_SESSION['level'] == USER_ADMIN) {
       ?>
                <div>
                    <a href="index.php?module=admin&action=index">Espace Administrateur</a>
                </div>

        <?php
            }
            else if ($_SESSION['level'] == USER_LAMBDA) {
         ?>
                <div>
                    <a href="index.php?module=user&action=index">Mon profil</a>
                </div>

           <?php }  ?>
          </div>
            <div>
                <a href="index.php?module=user&action=logout">Déconnexion</a>
            </div>

        <?php } ?>
        <div id="burger">
          <a href="#" id="trigger-overlay"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
        </div>
 </div>

</header>


<div class="coco">
<div class="wrapper">
  <form class="login"  method="post" action="?module=user&action=login">
    <p class="title">Connexion</p>
    <input type="email" placeholder="E-mail" autofocus name="mail" id="login"/>
   <i class="fa fa_user"></i>
    <input type="password" placeholder="Password" name="mdp" id="mdp"/>

    <i class="fa fa_key"></i>

    <a href="#">Forgot your password?</a>
    <button type="submit"  class="state">
      <span>Se connecter</span>
    </button>
  </form>
</div>
</div>

<div class="coco2">
  <div class="wrapper2">
    <form class="inscri" method="post" action="?module=user&action=new">
		<p class="title">S'inscrire</p>

		<label> Nom </label>
		<input type="text" name="login" maxlength="200" placeholder="Nom" required/>
    
		<label> Prénom </label>
		<input type="text" name="firstname" maxlength="200" placeholder="Prénom" required/>
  
		<label> Mot de passe </label>
		<input type="password" name="mdp" maxlength="200" placeholder="Azeaz" required/>

		<label> E-mail </label>
		<input  name="email" type="email" required placeholder="dupont@bou.com"/>

		<label> Age </label>
		<input type="text" name="age" maxlength="200" placeholder="Age" required/>
		<label> Genre </label><br>

		<div id="checki"><input type="checkbox" name="genre" value="F"/>F <input type="checkbox" name="genre" value="M"/>M
		</div><br>
		<label> Téléphone </label>
		<input type="text" name="phone" maxlength="200" placeholder="Téléphone" required/>

		<label>Description</label>
		<input type="text" id="descri" name="descri" maxlength="200" placeholder="Description" required/>

		<label>Categorie</label>
        <div>
		<?php
            if (isset($_GET["user"])) {
              scrollist("catid", $catid, "user_cat_id", "user_category_type", "dropdown", "listcat", array("default" => "Toutes les catégories", "selected" => $_POST["catid"]));
            } else {
              scrollist("catid", $catid, "user_cat_id", "user_category_type", "dropdown", "listcat", array("default" => "Toutes les catégories"));

            }
         ?>
		</div>

        <button type="submit"  class="state">
           <span>S'inscrire'</span>
        </button>

	</form>
  </div>
</div>
<script src="webroot/js/form.js"></script>
<script src="webroot/js/full_screen.js"></script>
