 <?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); ?>
 
  
    
<div class="form_co">
<div class="coco"
<div class="wrapper">
  <form class="login"  method="post" action="?module=user&action=login">
    <p class="title">CONNEXION</p>
    <input type="text" placeholder="E-mail" autofocus name="mail" id="login"/>
   <i class="fa fa_user"></i>
    <input type="password" placeholder="Password" name="mdp" id="mdp"/>
    
    <i class="fa fa_key"></i>

    <a href="#">Forgot your password?</a>
    <button>
      <i class="spinner"></i>
      <span type="submit"  class="state"/>Se connecter</span>
    </button>
  </form>
</div>
</div>
</div>

 <?php include("app/view/layout/footer.php"); ?>