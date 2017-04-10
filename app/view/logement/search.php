<?php include 'app/view/layout/header.php'; ?>
<div id="search_container">
	<form id="search" action="#" method="POST">
						<?php 
            if (isset($_GET["user"])) {
              scrollist("place", $place, "place_id", "place_name", "dropdown", "listplace", array("default" => "Sélectionnez une ville...", "selected" => $_GET["pays"])); 
            } else {
              scrollist("place", $place, "place_id", "place_name", "dropdown", "listplace", array("default" => "Sélectionnez une ville...")); 
            }
            ?>	
					
            <select name="type" class="dropdown" id="listtype">
              <option value="0">Types de logements</option>
            </select>
            <input type="text" name="saisie" id="saisie" placeholder="Loisir, gouts, affinités..." />
           
              <button  type="submit" ><i class="fa fa-search"></i></button>
	 </form>



<div id="testSearch">
  

      <?php if(isset($_GET['place'])) {
        foreach($logements as $logement) { ?>
				  <div class="logement">
         
            <img src="<?= TARGET_TOF.$logement['logement_photo'];?>" alt="photo principale du logement"/>
            <div class="info_logement">
            <span class='title'><?=$logement['logement_name'];?></span>
            <p><?=$logement['contenu'];?></p>
            <p><?php echo $logement['logement_category_type'].", ".$logement['place_name'];?></p>>
            <span class="price"><?= $logement['logement_price'];?>€/mois</span>
            </div>
            <a  href="?module=logement&action=detail&id=<?= $logement['logement_id']?>"> Lire la suite</a>
       
       </div>
<?php }} ?>
  

</div>
</div>
<script>
$(document).ready( function() {
  $("#listplace").change(function() {
    $("#listtype").load('webroot/ajax/type_filter.php?place='+$("#listplace").val() )
  });
});

$("#search").submit(function(e) {
  $(".logement").remove();
  e.preventDefault();
  var url = 'index.php?module=logement&action=search';
  history.pushState('no', 'Liste des résultats', url);

   
    var jqxhr = $.ajax(  {
      url: "webroot/ajax/post_search.php",
      method: "POST",
      data: "place=" + $('#listplace').val() + "&type=" + $('#listtype').val() + "&saisie=" + $('#saisie').val(),
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
<?php 
include 'app/view/layout/footer.php'; ?>