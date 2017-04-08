<?php

require_once 'libs/idiorm.php'; //ajout des deux librairies
require_once 'libs/paris.php';
require_once 'models/commercants.php'; 
ORM::configure('sqlite:data/data.sqlite'); //connexion à la bdd 

$primeurs = Model::factory('Commercants')
    ->where('categorie', '1')
    ->find_many();
/*$primeurs = Model::where('categorie', '1');
/*$rotissier = ModelCom::where('categorie', '2');
$poissoniers = ModelCom::where('categorie', '3');
$fromagers = ModelCom::where('categorie', '4');
$epiciers = ModelCom::where('categorie', '5');
$traiteurs = ModelCom::where('categorie', '6');
$bouchers = ModelCom::where('categorie', '7');
$cavistes = ModelCom::where('categorie', '8');
$boulangers = ModelCom::where('categorie', '9');*/

// fonction qui servira a afficher un commercant
function afficheCom($obj){?>
	<article class="boiteCom">
		<header class="Hboite">
			<h2><?php echo $obj->nom; ?></h2>
		</header>
		<section class='dispCom'>
			<p class="descCom"><?php echo $obj->desc; ?></p>
		</section>
	</article><?php
}
// fonction qui servira a afficher une slide
function slide($nom){?>
	<div class="slide"><header><?php echo $nom ?></header>
		<section class="boiteContact">
			<p>
				<?php  echo "$primeurs";
					foreach ($primeurs as $key => $value) {
					 	afficheCom($value)
					 }?>		
			</p>
		</section>
	</div><?php
}

?>
