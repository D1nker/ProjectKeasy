<?php include 'app/view/layout/header.php'; ?>


<form id="form" method="POST" action="?module=logement&action=reservation&id=<?=$_GET['id'] ?>">
<input type="date" name="dateA" placeholder="date arrivée"><br>
<input type="date" name="dateR" placeholder="date retour"><br><br>
<input type="submit" value="Valider">

</form>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="8HEQ3V65RM9H2">
<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>

<script>
 

</script>

<?php include 'app/view/layout/footer.php'; ?>