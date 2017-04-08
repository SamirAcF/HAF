<?php include 'main.php';?>


<!DOCTYPE html>
<html>
<head>
	<title>Bienvenue sur le site de la Halle au Frais</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/normalize.css">
	<link rel="stylesheet" type="text/css" href="style/style2.css">
	<link rel="stylesheet" type="text/css" href="style/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="style/jquery.fullPage.css"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:300,400,200" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<script type="text/javascript" src="libs/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="libs/jquery-ui.js"></script>
	<script type="text/javascript" src="libs/jquery.fullPage.min.js"></script>

	<?php
require_once 'libs/idiorm.php'; //ajout des deux librairies
require_once 'libs/paris.php';
require_once 'models/commercants.php'; 
ORM::configure('sqlite:data/data.sqlite'); //connexion à la bdd 
?>

</head>
<body>
	<!-- HEADER--> 
	<header id='header'>
		<div class="grid grid-pad">
			<div class="col-1-1">
				<nav id=myMenu>
					<ul>
						<li data-menuanchor="1stPage" class="active"><a href="#1stPage">LA HALLE</a></li> |
						<li data-menuanchor="2ndPage"><a href="#2ndPage">LES COMMERÇANTS</a></li> |
						<li data-menuanchor="3rdPage"><a href="#3rdPage">ACTUALITÉS</a></li> |
						<li data-menuanchor="4thPage"><a href="#4thPage">INFO/CONTACT</a></li> 
					</ul>
				</nav>	
			</div>
		</div>
	</header>

	<main>
		<div id="fullpage">
<!-- 		Première Slide : Accueil du site -->
			<div class='section active' id="accueil">
				<h1 class="titreSup centre">
					Bienvenue chez la halle au frais.
				</h1>
				<a href='#2ndPage'><img src="images/logo-halle.png" class="logo" alt="logo" /></a>
				<h1 class="titreSup centre">
				Cliquez pour découvrir nos commerçants !
				</h1>
			</div>
<!-- 		Seconde Slide : Les Commerçants  -->
			<div class='section' id="commercant">
					<?php afficheCom('Bertand','fromager','images/fromager.jpg','Venez rencontrer JBM le bg des bg'); ?>
					<?php afficheCom('Michael','génie du mal','images/fromager.jpg','Venez rencontrer Samy le bg des bg'); ?>
			</div>	


			<div class='section' id="actualites">Some section</div>
			<div class='section' id="infos">Some section</div>
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
		slidesNavigation: false,
		slidesNavPosition: 'top',

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
		continuousHorizontal: false,
		scrollHorizontally: false,
		interlockedSlides: false,
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
		sectionsColor : ['#008080', '#008080', '#008080', '#008080'],
		paddingTop: '3em',
		paddingBottom: '10px',
		/*fixedElements: '#header, .footer',*/
		responsiveWidth: 0,
		responsiveHeight: 0,
		responsiveSlides: false,
		parallax: false,
		parallaxOptions: {type: 'reveal', percentage: 62, property: 'translate'},

		//Custom selectors
		sectionSelector: '.section',
		slideSelector: '.slide',

		lazyLoading: true,

		//events
		onLeave: function(index, nextIndex, direction){},
		afterLoad: function(anchorLink, index){},
		afterRender: function(){},
		afterResize: function(){},
		afterResponsive: function(isResponsive){},
		afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){},
		onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){}
	});
});

window.onload = sliderAuto;

function sliderAuto(){
		setInterval(function(){$.fn.fullpage.moveSlideRight();},5000);
}
</script>
</body>
