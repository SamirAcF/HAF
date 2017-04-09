<?php

require_once 'libs/idiorm.php'; //ajout des deux librairies
require_once 'libs/paris.php';
require_once 'models/commercants.php'; 
ORM::configure('sqlite:data/data.sqlite'); //connexion à la bdd 

$primeurs = Model::factory('Commercants')
    ->where('categorie', '1')
    ->find_many();
$rotissiers = Model::factory('Commercants')
    ->where('categorie', '2')
    ->find_many();
$poissoniers = Model::factory('Commercants')
    ->where('categorie', '3')
    ->find_many();
$fromagers = Model::factory('Commercants')
    ->where('categorie', '4')
    ->find_many();
$epiciers = Model::factory('Commercants')
    ->where('categorie', '5')
    ->find_many();
$traiteurs = Model::factory('Commercants')
    ->where('categorie', '6')
    ->find_many();
$bouchers = Model::factory('Commercants')
    ->where('categorie', '7')
    ->find_many();
$cavistes = Model::factory('Commercants')
    ->where('categorie', '8')
    ->find_many();
$boulangers = Model::factory('Commercants')
    ->where('categorie', '9')
    ->find_many();

// fonction qui servira a afficher un commercant
function afficheCom($obj,$tab){?>
	<article class="boiteCom col-1-<?php echo count($tab); ?>">
		<header class="Hboite">
			<h2 class="nomComm"><?php echo $obj->nom; ?></h2>
		</header>
		<section class='dispCom'>
			<p class="descCom"><?php echo $obj->description; ?></p>
			<?php if($obj->email):?>
				<p class="descCom">Nous contacter <?php echo $obj->email; ?></p>
			<?php endif;?>
		</section>
	</article><?php
}
// fonction qui servira a afficher une slide
function slide($nom,$var){?>
	<div class="slide">
		<header class="titreSlide">Les <?php echo $nom; ?></header>
		<section class="conteneurCom grid grid-pad">
			<p>
				<?php
					foreach($var as $key => $value) {
					 	afficheCom($value,$var);
					 }
				?>	
			</p>
		</section>
	</div><?php
}

?>
