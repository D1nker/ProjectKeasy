<?php

 include 'app/view/layout/header.php';
 ?>
<section class="faq">
  <h1 class="subtitle">Foire aux questions</h1>
	<ul class="categories">
		<li><a class="selected" href="#basics">Inscription</a></li>
		<li><a href="#mobile">Recherche</a></li>
		<li><a href="#account">Réservation</a></li>
		<li><a href="#payments">Paiement</a></li>

	</ul> <!-- categories -->

	<div class="faq-items">
		<ul id="basics" class="faq-group">
			<li class="faq-title"><h2>Inscription</h2></li>
			<li>
				<a class="trigger" href="#0">Comment changer de mot de passe ?</a>
				<div class="faq-content">
          <p>Vous pouvez à tout moment modifier vos informations dans la section "profil" du header. Mot de passe inclus.</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Comment s'inscrire ?</a>
				<div class="faq-content">
					<p>Pour rejoindre l'aventure Keasy, rien de plus facile inscrivez-vous via notre formulaire ou directement via votre compte Facebook ou Google.</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Puis-je retirer une annonce ?</a>
				<div class="faq-content">
					<p>Rien de plus facile, dans la section votre "profil", un onglet est dédié à vos annonces, où vous pouvez les modifier à tout moment.</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Est-ce que l'inscription est payante ?</a>
				<div class="faq-content">
					<p>Non ! Vous pouvez à tout moment rejoindre l'aventure Keasy <b>gratuitement</b>, des frais sont appliqués seulement lorsqu'une réservation est effectuée !</p>
				</div> <!-- faq-content -->
			</li>
		</ul> <!-- faq-group -->

		<ul id="mobile" class="faq-group">
			<li class="faq-title"><h2>Recherche</h2></li>
			<li>
				<a class="trigger" href="#0">Comment la recherche fonctionne ?</a>
				<div class="faq-content">
					<p>Rien de plus simple, vous choisissez votre ville parmis celles proposées, des résultats apparaitront en fonction, vous pouvez même customiser votre recherche avec vos goûts et préférences :).</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Votre site est-il accessible depuis un mobile ?</a>
				<div class="faq-content">
					<p>Oui le site sera 100% Mobile Friendly !</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Qu'entendez vous par goûts et préférences ?</a>
				<div class="faq-content">
					<p>Si vous aimez le foot, la cuisine par exemple, vous pouvez l'indiquer et nous vous proposerons des colocateurs qui ont les mêmes goûts que vous ! :)</p>
				</div> <!-- faq-content -->
			</li>
		</ul> <!-- faq-group -->

		<ul id="account" class="faq-group">
			<li class="faq-title"><h2>Réservation</h2></li>
			<li>
				<a class="trigger" href="#0">Comment les réservations fonctionnent ?</a>
				<div class="faq-content">
					<p>Selon la disponibilité, une fois votre logement choisi, grâce au bouton "réserver ce logement" une demande est directement envoyée au propriétaire et celui-ci accepte ou non.</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Comment s'effectue le paiement d'une réservation ?</a>
				<div class="faq-content">
					<p>Une fois la réservation acceptée, la demande de paiement est redigirée vers notre site Keasy, arpès vérification de la bonne intégrité de l'annonce, le paiement est alors versé au propriétaire.</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Puis-je annuler une réservation ?</a>
				<div class="faq-content">
					<p>Oui dans un délai de 7 jours, la réservation est annulable, cependant des frais peuvent s'appliquer.</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Si la réservation ne corresponds pas à l'annonce, que faire ?</a>
				<div class="faq-content">
					<p>Si l'annonce du propriétaire fait défault, il est possible d'annuler immédiatement, et d'être rembousé à 100%.</p>
				</div> <!-- faq-content -->
			</li>
		</ul> <!-- faq-group -->

		<ul id="payments" class="faq-group">
			<li class="faq-title"><h2>Paiement</h2></li>
			<li>
				<a class="trigger" href="#0">Le paiement sur votre site est-il sécurisé ?</a>
				<div class="faq-content">
					<p>Oui, le paiement s'effectue via Paypal et dispose d'un certificat valide et sécurisé.</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Pourquoi ma carte bleue ne passe pas ?</a>
				<div class="faq-content">
					<p>Il est possible que des erreurs arrivent, si vous possèdez les fonds et que vous n'arrivez pas à réserver, contactez-nous directement.</p>
				</div> <!-- faq-content -->
			</li>

			<li>
				<a class="trigger" href="#0">Pourquoi mon relevé bancaire affiche plusieurs factures ?</a>
				<div class="faq-content">
					<p>Généralement, les factures de Keasy sont divisées en plusieurs parties : 1 pour le propriétaire et une autre pour l'équipe. Ne vous inquiétez pas, cela est normal.</p>
				</div> <!-- faq-content -->
			</li>
		</ul> <!-- faq-group -->

	</div> <!-- faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- faq -->


    <script src="webroot/js/faq.js"></script>
	<?php include 'app/view/layout/footer.php'; ?>
