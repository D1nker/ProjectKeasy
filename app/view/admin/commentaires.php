<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
?>



    <h3>Liste des commentaires</h3>
    		<?php
                if (isset($_GET["user"])) {
                  scrollist("user", $users, "user_id", "user_mail", "form-control", "listuser", array("default" => "Tous les users", "selected" => $_GET["user"]));
                } else {
                  scrollist("user", $users, "user_id", "user_mail", "form-control", "listuser", array("default" => "Tous les users"));
                }
             ?>


        <div class="table-responsive">
         <table class='table table-hover'>
          <thead>
           <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Date</th>
            <th>Nom du logement</th>
            <th>Modifier</th>
            <th>Supprimer</th>
           </tr>
          </thead>
          <tbody id="content">
          </tbody>
        </table>
      </div>




<script>
$("#listuser").change(function(e) {
$('.comms').remove();
 e.preventDefault();

   var jqxhr = $.ajax(  {
     url: "webroot/ajax/admin_search_com.php",
     method: "POST",
     data: "user=" + $('#listuser').val(),
     dataType: "html"
   })
     .done(function() {
        console.log( "success" );
        console.log(jqxhr.responseText);

        $("#content").append(jqxhr.responseText);

   })
     .fail(function() {
       console.log( "error" );
   })

 });


</script>
