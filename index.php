<?php include 'header.php';


$good = false;
$complet = isset($_POST["nom"]) && isset($_POST["mail"]) && isset($_POST["sujet"]) && isset($_POST["contenu"]);
/*if($complet){
$transport = new Swift_SmtpTransport("smtp-slokilla.alwaysdata.net",25);
$mailer = new Swift_Mailer($transport);

$message = new Swift_Message($_POST["sujet"])
  ->setFrom($_POST['mail'])
  ->setTo('alicherif.samir@gmail.com')
  ->setBody('<h3>Nouveau Message de '.$_POST["nom"]."</h3><p>".nl2br($_POST["contenu"])."</p>", "text/html")
  ;

$result = $mailer->send($message);
$good= true;
}*/
?>

	<main>
		<div id="fullpage">
		
<!-- 		Première Slide : Accueil du site -->
			<div class='section active'>
				<h1 class="titreSup centre">
					Bienvenue chez la halle au frais.
				</h1>
				<img src="images/logo-halle.png" class="logo" alt="logo" />
				<h1 class="titreSup centre">
				Défilez pour découvrir nos commerçants !
				</h1>
			</div>
<!-- 		Seconde Slide : Les Commerçants  -->
			<div class='section'>
				<?php  
					slide("primeurs",$primeurs);
				?>	
				<!---------------------------------------------->	
				
				<?php  
					slide("rotissiers",$rotissiers);
				?>	
				<!-- ------------------------------------------ -->	
				
				<?php  
					slide("poissoniers",$poissoniers);
				?>	
				<!-- ------------------------------------------ -->	
				
				<?php  
					slide("fromagers",$fromagers);
				?>	
				<!-- ------------------------------------------ -->	
				
				<?php  
					slide("epiciers",$epiciers);
				?>	
				<!-- ------------------------------------------ -->	
				
				<?php  
					slide("traiteurs",$traiteurs);
				?>	
				<!-- ------------------------------------------ -->	
				
				<?php  
					slide("bouchers",$bouchers);
				?>	
				<!-- ------------------------------------------ -->	
				
				<?php  
					slide("cavistes",$cavistes);
				?>	
				<!-- ------------------------------------------ -->	
				
				<?php  
					slide("boulangers",$boulangers);
				?>	
			</div>


			<div class='section' id="actualites">Aucunement le temps de gérer ceci, cependant, nous vous présenterons ce qui était prévu lors de la 
			soutenance.</div>

			<!-- Quatrième slide : Infos pratiques -->
			<div class='section'>
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1285.0836327413474!2d2.2933096567835953!3d49.89566297940267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7843fb1051a61%3A0xbe8540a39e95150d!2s22B+Rue+du+G%C3%A9n%C3%A9ral+Leclerc%2C+80000+Amiens!5e0!3m2!1sfr!2sfr!4v1496521017467" width="1140" height="400" frameborder="0" style="margin-left: 50vw;transform: translateX(-50%);" allowfullscreen></iframe>

			</div>

			<!-- Dernière slide : Contacts -->
			<div class='section' >
				
				<div class="grid grid-pad">
					<div class="col-6-12">
				<?php 	if(!$good):
							if($_POST && !$complet):?>
								<div class="errorInPage">
									<p> Le formumlaire n'est pas complet</p>
								</div>
					<?php	endif; ?>
								<h1 class='titreForm'>Nous contacter directement</h1>
		
								<form action="index.php#Contact" method="POST">
		
									<div class="form-group">
										<label class="control-label for="nom">Votre nom:</label>
										<input type="text" class="form-control" id="nom" name='nom' placeholder="Entrez votre nom">
									</div>
		
									<div class="form-group">
										<label for="mail">Votre Email:</label>
										<input type="email" class="form-control" id="mail" name="mail" placeholder="Entrez votre adresse Email">
									</div>
		
									<div class="form-group">
										<label for="sujet">Sujet</label>
										<input type="text" class="form-control" id="sujet" name="sujet" placeholder="Entrez le sujet de votre message">
									</div>
		
									<div class="form-group">
										<label class="control-label" for="contenu">Message :</label>
									    <textarea name="contenu" class="form-control" placeholder="Entrez votre message ici" rows="8"></textarea>
									</div>
		
									<div class="form-group"> 
									    <input type="submit" class="btn btn-default" name="envoyer" value='Envoyer'>
									</div>
								</form>
				<?php 	else:
							include 'success.php';
						endif;
				?>

					</div>
					<div class="col-6-12 push-6-12">

					</div>
				</div>

			</div>
		</div>
		<footer >
			<span class="credits">
				<p>©Fraicheurs 2017</p>
				<p><a href="login.php">Administrer</a></p>
			</span>
		</footer>
	</main>
	<script type="text/javascript">

$(document).ready(function() {
	$('#fullpage').fullpage({
		//Navigation
		menu: '#myMenu',
		lockAnchors: false,
		anchors:['Accueil', 'Commercants', 'News', 'Infos', 'Contact'],
		navigation: false,
		navigationPosition: 'right',
		navigationTooltips: ['Acceuil', 'Commerçants','Actualités', 'Informations', 'Contact'],
		showActiveTooltip: false,
		slidesNavigation: true,
		slidesNavPosition: 'bottom',

		//Scrolling
		css3: true,
		scrollingSpeed: 700,
		autoScrolling: true,
		fitToSection: true,
		fitToSectionDelay: 1000,
		scrollBar: false,
		easing: 'easeInOutCubic',
		easingcss3: 'ease',
		loopBottom: false,
		loopTop: false,
		loopHorizontal: true,
		continuousVertical: false,
		continuousHorizontal: true,
		scrollHorizontally: true,
		interlockedSlides: true,
		dragAndMove: true,
		offsetSections: false,
		resetSliders: false,
		fadingEffect: false,
		normalScrollElements: '#element1, .element2',
		scrollOverflow: false,
		scrollOverflowReset: false,
		scrollOverflowOptions: null,
		touchSensitivity: 15,
		normalScrollElementTouchThreshold: 5,
		bigSectionsDestination: null,

		//Accessibility
		keyboardScrolling: true,
		animateAnchor: true,
		recordHistory: false,

		//Design
		controlArrows: true,
		verticalCentered: true,
		//sectionsColor : ['#ADD8E6', '#ADD8E6', '#ADD8E6', '#ADD8E6'], //Skyblue
		sectionsColor : ['#fff', '#fff', '#fff', '#fff'],
		paddingTop: '3em',
		paddingBottom: '10px',
		//fixedElements: '#header',
		responsiveWidth: 0,
		responsiveHeight: 0,
		responsiveSlides: false,
		parallax: false,
		parallaxOptions: {type: 'reveal', percentage: 62, property: 'translate'},

		//Custom selectors
		sectionSelector: '.section',
		slideSelector: '.slide',

		lazyLoading: false,
		//events
		onLeave: function(index, nextIndex, direction){},
		afterLoad: function(anchorLink, index){},
		afterRender: function(){},
		afterResize: function(){},
		afterResponsive: function(isResponsive){},
		afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){},
		onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){$(".titreSlide").css('width','11.111111%')}
	});	

});


</script>
</body>
