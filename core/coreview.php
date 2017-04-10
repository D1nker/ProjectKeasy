<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
function paginate($nb_enregistrements, $nb_par_pages, $module, $action, $options = "") {

    $nb_pages = ceil($nb_enregistrements / $nb_par_pages);

    echo "<div class='row'>";

    echo "<nav class='center' aria-label='Page navigation'>";

    echo "<ul class='pagination'>";

    for($i = 1; $i <= $nb_pages; $i++){

        echo "<li><a href=\"?module=".$module."&action=".$action."&page=".$i. $options . "\">" .$i . "</a></li>";

    }

    echo "</ul>";

    echo "</nav>";

    echo "</div>";

}

function scrollist ($name, $data, $idcol, $valuecol, $classname, $idname, $options = array() ) {
 echo "<select name='" . $name . "' class='" . $classname . "'  id='" . $idname . "'>";

        if (isset($options["default"])) {
            echo "<option value='0'>" . $options["default"] . "</option>";
        }
					 foreach($data as $rec) { 
								
						 echo "<option value='" . $rec[$idcol] . "'";
                         if (isset($options["selected"]) != "" && ($rec[$idcol] == $options["selected"] )) {
                                echo " selected";        
                         }
                         echo ">";
                         echo $rec[$valuecol];
                         echo "</option>";
           }	
						 echo "</select>";
}