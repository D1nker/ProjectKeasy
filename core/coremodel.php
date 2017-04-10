<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
function counttable($table, $options=array()) {

    global $pdo;

    try {
        // send req
        $sql = ('SELECT count(*) as nb FROM ' . $table);
            if ((isset($options["wherecolumn"])) && (isset($options["wherevalue"]))){
                $sql .= ' WHERE ' . $options["wherecolumn"] . "='" . $options["wherevalue"] . "'";
            }
        $query = $pdo->prepare($sql);
        // execute req
        $query->execute();

        // fetch req
        $result = $query->fetch();

        // sup cursor
        $query->closeCursor();

        return $result["nb"];
    }

    catch (Exception $e) {
        die("Connection à MySQL impossible : " . $e->getMessage());
    }
}



function selecttable($table, $options=array(), $offset=array())
{
    global $pdo;

try {
    //On envoie la requête
    $sql = 'SELECT * FROM ' . $table;

    if ((isset($options["wherecolumn"])) && (isset($options["wherevalue"]))){
    $sql .= ' WHERE ' . $options["wherecolumn"] . "='" . $options["wherevalue"] . "'";
        }
       
    if (isset($options["orderby"])) {
              $sql .= ' ORDER BY ' . $options["orderby"];
                if (isset($options["orderby"])){
                    $sql .= '  ' . $options["order"];
                }
            }
     if (isset($options["limit"])) {
        $sql .= ' LIMIT ';
        if (isset($options["offset"])) {
            $sql .= $options["offset"] . " , ";
        }
        $sql .= $options["limit"];
    }


 
    $query = $pdo->query($sql);
    

    $data = $query->fetchAll();
   
    $query->closeCursor();
    
    return $data;
}

catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
}
}

function deletetable ($table, $options=array()) {

    global $pdo;

    try {


       $sql = 'DELETE FROM ' . $table ;
       if ((isset($options["idcolumn"])) && (isset($options["idvalue"]))){
         $sql .= ' WHERE ' . $options["idcolumn"] . " = " . $options['idvalue'];
       }

        // execute req
        $query = $pdo->exec($sql);

        return true;

    }
    catch (Exception $e) {
    die('Erreur SQL : ' . $e->getMessage());
}
}