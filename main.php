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


			<?php if($obj->description): //Vérification de la présence d'une description dans la base?>
				<p class="descCom"><?php echo $obj->description; ?>
			<?php endif;

			if($obj->email): //Vérification de la présence d'une adresse mail dans la base?>
				<p>Nous contacter :<?php echo $obj->email; ?></p>
			<?php endif;
			
			$fixe=separerFixePortable($obj->telephone)[0]; // on traite les numeros de téléphone
			$portable=separerFixePortable($obj->telephone)[1];
			if($fixe != "" ): ?>
				<p>Numéro de téléphone : <?php echo $fixe; ?></p>
			<?php  endif;
			if($portable != ""):?>
				<p>Numero de portable : <?php echo $portable; ?></p>
			<?php endif;

			if($obj->horaires == "classique"): //Vérification du fait que les horraire concorde avec ceux de la halle?>
				<p>Nous somme ouverts du Mardi au Jeudi de 9h à 13h et de 15h à 19h, le vendredi et le samedi de 9h à 19h et le dimanche de 9h à 12h30.</p></p>
			<?php endif;?>
		</section>
	</article>

	<?php
	if($tab == count($tab)):?>

		<article class="boiteCom col-1-<?php echo ($tab); ?>">		
			<section class="dispCom">
				<a href="NouveauCommercant.php">Ajouter un commerçant</a>
			</section>
		</article>
	<?php endif;
}
// fonction qui servira a afficher une slide
function slide($nom,$var){?>
	<div class="slide">
		<header class="titreSlide">Les <?php echo $nom; ?></header>
		<section class="conteneurCom grid grid-pad">
				<?php

					foreach($var as $key => $value) {
					 	afficheCom($value,$var);
					}
				?>
		</section>
	</div><?php
}

function separerFixePortable($chaine){
	$chaine=str_split($chaine);
	$fixe ="";
	$portable ="";
	$toggle=false;

	for ($i=0; $i < count($chaine) ; $i++) {
		//error_log($fixe." ".$portable."\n", 3, "logs.txt");
		if($toggle==false){
			if($chaine[$i] == ","){
				$toggle=true;
			}
			else{
				$fixe .= $chaine[$i];
			}
		}
		else{
			$portable .= $chaine[$i];
		}
	}	
	return array($fixe,$portable);
}

function supprimerDernierCarac($chaine){
	$chaine=str_split($chaine);
	array_pop($chaine);
	implode($retour,$chaine);
	return $retour;
}
?>
