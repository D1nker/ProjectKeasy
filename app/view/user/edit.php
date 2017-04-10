     <?php 
 if(!defined("_BASE_URL")) die("Ressource interdite !");
 include("app/view/layout/header.php"); 
 include("app/view/layout/user_sidebar.php") ;

  ?>

<div class="ajout_contain">
    <h1>Modifier son profil</h1>
    <div id="form-main">
  <div id="form-div">
    <form class="form" id="form1" method="POST" action="?module=user&action=edit"  enctype="multipart/form-data">
      <input type="hidden" id="hidden" value="<?= $user["user_nationality"] ?>"/>
      <p class="firstname">
        <input name="firstname" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"  value="<?= $user["user_lastname"] ?>" placeholder="Prénom" id="firstname" />
      </p>

      <p class="lastname">
        <input name="lastname" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" value="<?= $user["user_firstname"] ?>" placeholder="Prénom" id="lastname" />
      </p>
      
      <p class="mail">
        <input name="mail" type="mail" class="validate[required,custom[email]] feedback-input" id="email" value="<?= $user["user_mail"] ?>" placeholder="Email" />
      </p>

      <p class="password">
        <input name="password" type="password" class="validate[required,custom[email]] feedback-input" value="<?= $user["user_password"] ?>" id="mdp" placeholder="Mot de passe" />
      </p>

      <p class="nationality">
      <?php include ('app/view/layout/nationality.php'); ?><br>
      </p>

      <p class="age">
        <input name="age" type="text" class="validate[required,custom[email]] feedback-input" id="age" value="<?= $user["user_age"] ?>" placeholder="Age" />
      </p>

      <p class="sexe">
        <input name="gender" type="text" class="validate[required,custom[email]] feedback-input" id="sexe" value="<?= $user["user_gender"] ?>" placeholder="Sexe" />
      </p>

      <p class="Numero">
        <input name="numero" type="text" class="validate[required,custom[email]] feedback-input" id="numero" value="<?= $user["user_phone_number"] ?>" placeholder="Numéro" />
      </p>

      <p class="text">
        <textarea name="descr" class="validate[required,length[6,300]] feedback-input" id="descr"><?= $user["user_description"] ?></textarea>
      </p>
     
      <p class="photo">
        <input type="file" name="photo" class="validate[required,length[6,300]] feedback-input" id="photo" placeholder="Parlez de vous, de vos goûts...">
      </p>

      
      
      <div class="submit">
        <input type="submit" value="MODIFIER" id="button-blue"/>
     
      </div>
    </form>
  </div>
</div>

    
 <script>

CKEDITOR.replace( 'descr' );

$(function() {
    var x = $('#hidden').val();
    $("option[value="+x+"]").attr( "selected", "selected" );
    console.log(x);
  });

       
 </script>
</form>
 
</div>
</div>

 <?php include("app/view/layout/footer.php"); ?>
							