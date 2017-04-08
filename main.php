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


function afficheCom($nom,$commerce,$cheminImage,$desc){?>
		<article class=" boiteCom">
			<header class="Hboite">
				<h2><?php echo $nom; ?> le <?php echo $commerce?></h2>
			</header>
			<section class='dispCom'>
				<img class='imageCom' src='<?php echo $cheminImage;?>' />
				<p class="descCom"><?php echo $desc; ?></p>
			</section>
		</article><?php
}
?>