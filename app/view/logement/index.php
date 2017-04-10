<?php
if(!defined("_BASE_URL")) die("Ressource interdite !");
include 'app/view/layout/header.php';
?>

<div class="content_search" >
<h1>KE<span class="keasyblue">AS</span>Y, UNE PLATEFORME <span class="keasyblue">ETUD</span>IANTE</h1>

<?php
include 'app/view/layout/module_search.php';
?>
</div>




<div class="contact">
      <h2>Ne perdez plus de temps, rejoignez l'aventure Keasy!</h2>
      <p>Inscription facile et gratuite <br> Louer l'appartement de vos rêves en quelques clics.</p>

      <a href="?module=logement&action=new">S'inscrire</a>
</div>


	<section id="tres">
		<div  id="grece">

		<div id="conteneurcarré">
		<div class="carré1">
			<div class="centre">
				<div><a href="?module=display&action=temoignages"><img class="logo1" alt="picto des différents bandeaux de KEASY, plateforme de location de logements pour étudiants" src="webroot/photos/picto/money.png"></a></div>
				<div class="titre1">Keasy vous fait économiser de l'argent sur votre logement étudiant.</div>
				<div class="explication1">Trouver l'appartement de vos rêves à prix réduit. Profitez de votre expérience, en faisant des économies.</div>
			</div>
		</div>
		<div class="carré2">

			<div class="l1">
				<div class="c1">
					<div><a href="?module=display&action=temoignages2"><img alt="picto des différents bandeaux de KEASY, plateforme de location de logements pour étudiants" class="logo2" src="webroot/photos/picto/answer.png"></a></div>
					<div class="titre2">Tous les locataires sont des étudiants.</div>
					<div class="explication2">A travers un système de ciblage personnalisé, trouvez le logement correspondant à tous vos critères de sélection!</div>
				</div>
				<div class="r1"></div>
			</div>

			<div class="l1">
				<div class="r1"></div>
				<div class="c2" id="redIn">
					<div><img class="logo2" alt="picto des différents bandeaux de KEASY, plateforme de location de logements pour étudiants" src="webroot/photos/picto/icon.png"/></div>
					<div class="titre2">Une inscription à la fois simple et gratuite.</div>
					<div class="explication2">En quelques clics rejoignez l'aventure Keasy!</div>
				</div>
			</div>

		</div>



		</div>

		</div>
</section>
<div class="owner">
    <h2>Vous êtes propriétaires ?</h2>
    <p>Keasy c'est aussi une plateforme pour les propriétaires qui<br> cherchent à louer leur appartement de manière sure, sécurisée avec des étudiants validés !</p>

    <a href="?module=logement&action=new">Déposer une annonce</a>

</div>




<section id="cuatro">
	<div class="b111">
		<div class="n2">
			<div class="n3">
				<div class="chif">
25 301</div>
				<div class="chif2">Membres</div>
			</div>
			<div class="n4">
				<div class="chif">12</div>
				<div class="chif2">Villes</div>
				<div class="chif3">Paris - Bordeaux - Lille - Marseille - Madrid - Barcelone - Lisbonne - Londres - Dublin - Lille - Bruxelles - Copenhague</div>
			</div>
		</div>
		<div class="n1"><img alt="carte des lieux ou KEASY est présent dans le monde" src="webroot/photos/picto/carte2.png" id="carte"></div>
	</div>

  <section id="bandeau_temoignages">
    <div class="container-temoignage">
      <div class="row-temoignage">

        <div class="section-title">
          <h2> Ils ont rejoint l'aventure Keasy : </h2>
        </div>

        <div class="carousel-client">
          <div class="hec"><a href="http://www.hec.fr/" target="_blank"><img src="webroot/photos/partenaire/HEC.svg" title="logo_hec" alt="logo_hec"></a></div>
          <div class="hetic"><a href="http://wwww.hetic.net/" target="_blank"><img src="webroot/photos/partenaire/hetic.png" title="logo_hetic" alt="logo_hetic"></a></div>
          <div class="eemi"><a href="http://www.eemi.com/" target="_blank"><img src="webroot/photos/partenaire/logo-eemi.png" title="logo_eemi" alt="logo_eemi"></a></div>
          <div class="sorbonne"><a href="http://www.paris-sorbonne.fr/" target="_blank"><img src="webroot/photos/partenaire/sorbonne.png" title="logo_sorbonne" alt="logo_sorbonne"></a></div>
        </div>

      </div>
    </div>
  </section>
	</section>



<?php include 'app/view/layout/footer.php'; ?>
