<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
?>


<div id="user_contain">
    <h3>Liste des commentaires</h3>


    <ul class="list-group">
  <li class="list-group-item">

    <?php
    if (isset($_GET["user"])) {
      scrollist("user", $users, "user_id", "user_firstname", "dropdown", "listuser", array("default" => "Tous les users", "selected" => $_GET["user"]));
    } else {
      scrollist("user", $users, "user_id", "user_firstname", "dropdown", "listuser", array("default" => "Tous les users"));
    }
    ?>  </li>
</ul>

        <?php

        foreach ($commentaire as $com) {
            ?>
            <div class="comms">

            <h4><?=$com['comment_title'] ?></h4>
            <p><?=$com['comment_message'] ?></p>
            <p><?=$com['comment_id'] ?></p>
            <a href="?module=admin&action=delete_commentaire&page=<?= $page ?>&id=<?=$com['comment_id']?>
            " onclick="return confirm('Voulez vous vraiment suprimmer ce commentaire?');"> SUPPRIMER </a>
        </div>
            <?php
        } ?>
</div>
<?php
if (isset($_GET["user"])) {
paginate($nb_commentaires, PAGINATION_COMMENTS, 'admin', 'index', '&user=' . $_GET['user']);
} else {
paginate($nb_commentaires, PAGINATION_COMMENTS, 'admin', 'index');
}
?>
<script type="text/javascript" src="webroot/js/commentaire_admin.js"></script>
