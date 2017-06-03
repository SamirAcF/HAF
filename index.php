<?php 
session_start();
include 'main.php';
?>

<?php include 'header.php';?>
	<main>
<?php 	
		if(isset($_SESSION["name"]) && isset($_SESSION["pass"])):?>
		<div class="admin">
			<a href="admin.php"><img src="images/admin.png" alt='gestion'/></a>
		</div>
<?php endif ?>
		<div id="fullpage">
<!-- 		Première Slide : Accueil du site -->
			<div class='section active' id="accueil">
				<h1 class="titreSup centre">
					Bienvenue chez la halle au frais.
				</h1>
				<img src="images/logo-halle.png" class="logo" alt="logo" />
				<h1 class="titreSup centre">
				Défilez pour découvrir nos commerçants !
				</h1>
			</div>
<!-- 		Seconde Slide : Les Commerçants  -->
			<div class='section' id="commercant">
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

			<!-- Dernière slide : La communication -->
			<div class='section' id="infos">
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1285.0836327413474!2d2.2933096567835953!3d49.89566297940267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7843fb1051a61%3A0xbe8540a39e95150d!2s22B+Rue+du+G%C3%A9n%C3%A9ral+Leclerc%2C+80000+Amiens!5e0!3m2!1sfr!2sfr!4v1496521017467" width="1140" height="400" frameborder="0" style="margin-left: 50vw;transform: translateX(-50%);" allowfullscreen></iframe>

				<footer>
					<span class="credits">
						<p>©Fraicheurs 2017</p>
						<p><a href="login.php">Administrer</a></p>
					</span>
				</footer>
			</div>
		</div>
	</main>
	<script type="text/javascript">

$(document).ready(function() {
	$('#fullpage').fullpage({
		//Navigation
		menu: '#myMenu',
		lockAnchors: false,
		anchors:['1stPage', '2ndPage', '3rdPage', '4thPage'],
		navigation: false,
		navigationPosition: 'right',
		navigationTooltips: ['Acceuil', 'Commerçants','Actualités', 'Infos Et Contact'],
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
		recordHistory: true,

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
