 <?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); ?>
 
  <h3>Sign in</h3>
    <form id="signinForm" method="post" action="?module=school&action=login" >

        <input name="mail" type="mail"  id="mail" placeholder="Mail"><br><br>
        <input name="mdp" type="password"  id="mdp" placeholder="Password"><br><br>
        <input type="submit" value="Se connecter"/>
    </form>

 <?php include("app/view/layout/footer.php"); ?>