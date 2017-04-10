<?php include 'app/view/layout/header.php'; ?>
<div id="contact_title">
<h1>Contactez l'équipe de Keasy</h1>

<p>N'oubliez pas de mentionner votre nom et prénom dans votre message<br><i>Cordialement, Keasy</i></p>
</div>
<div id="form-main">
  <div id="form-div">
    <form class="form" id="form1" method="POST" action="?module=messenger&action=contact_us">

      <p class="firstname">
        <input name="title" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"  placeholder="Titre de votre message"  />
      </p>

      <p class="lastname">
        <input name="dateC" type="date" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"  />
      </p>
      
     <p class="text">
        <textarea name="descr" class="validate[required,length[6,300]] feedback-input" id="descr" placeholder="Ecrivez votre message"></textarea>
      </p>
       
      <div class="submit">
        <input type="submit" value="ENVOYER" id="button-blue"/>
     
      </div>
    </form>
</div>
</div>

<?php include 'app/view/layout/footer.php'?>