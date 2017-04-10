<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
?>

<div id="user_contain">

  <?php
           if (isset($_GET["user"])) {
             scrollist("place", $place, "place_id", "place_name", "dropdown", "listplace", array("default" => "Tous les pays", "selected" => $_GET["place"]));
           } else {
             scrollist("place", $place, "place_id", "place_name", "dropdown", "listplace", array("default" => "Tous les pays"));
           }
           ?>

    <h3>Liste des logements</h3>
    <div class="table-responsive">
         <table class='table table-hover'>
          <thead><tr>
          <th>Photos</th>
          <th>Nom</th>
          <th>Nom du logement</th>
          <th>Prix</th>
          <th>Adresse</th>
          <th>Type</th>
          <th>Modifier</th>
          <th>Supprimer</th>
        </tr></thead>
          <tbody id="testSearch">
          </tbody>
        </table>
      </div>
<script>
$("#listplace").change(function(e) {
$('.logement').remove();
 e.preventDefault();

   var jqxhr = $.ajax(  {
     url: "webroot/ajax/admin_search.php",
     method: "POST",
     data: "place=" + $('#listplace').val(),
     dataType: "html"
   })
     .done(function() {
        console.log( "success" );
        console.log(jqxhr.responseText);

        $("#testSearch").append(jqxhr.responseText);

   })
     .fail(function() {
       console.log( "error" );
   })

 });

</script>
</div>
