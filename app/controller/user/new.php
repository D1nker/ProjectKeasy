<?php 
if(!defined("_BASE_URL")) die("Ressource interdite !");

// Maximum sécurité
//$options = [
  //  'cost' => 10,
    //'salt' => random_bytes(22),
   // ]; 

$catid = selecttable('cat_user', array("orderby" => "user_category_type",
                                                        "order" => "ASC",
                                        "limite" => ":offset", ":limit"
                                        ));

if(isset($_POST["login"])) {


  
    
    $key = md5(uniqid(mt_rand()));
   // $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
   $_POST["mdp"] = md5($_POST["mdp"]. SALT);
    include_once('app/model/user/new_user.php');
    $resultat = inserer_users($_POST, $key);
    
  
  if ($resultat) {
    include("lib/mail.php");
    $html = "<html>
                <body>
                    <div>
                        <p>Bonjour<b> ". $_POST["login"]. "</b></p>
                        <p>Merci de confirmer votre inscription en clickant sur le lien ci-dessous :
                            <a href='http://localhost/keasy/index.php?module=user&action=validate_user&key=".$key."'>Confirmer</a>
                        </p>
                    </div>
                </body>
             </html>";
    $ret = sendmail(MAIL_EXPEDITEUR, NOM_EXPEDITEUR,
                 MAIL_EXPEDITEUR, $_POST["email"],    
                  "", "Bienvenue sur le site!",
                  "", $html, "");
    header("Location:?module=logement&action=index&notif=ok");
   } else {
    header("Location:?module=logement&action=index&notif=nok");
}
}  



include_once("app/view/logement/index.php");