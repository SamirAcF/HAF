<?php

require_once 'libs/idiorm.php'; //ajout des deux librairies
require_once 'libs/paris.php';
require_once 'models/commercants.php';
require_once 'models/categorie.php'; 
require_once 'models/admin.php'; 

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
$ensembleComm = Model::factory('Commercants')
	->find_many();
$cat = Model::factory('categorie')->find_many();
$corres = array('Primeur' => 1, 'Rotissier' => 2, 'Poissonnier' => 3, 'Fromager' => 4, 'Epicier' => 5, 'Traiteur' => 6, 'Boucher' =>7, 'Caviste' => 8, 'Boulanger' => 9 );
$corres2 = array(1=>'Primeur', 2=>'Rotissier', 3=>'Poissonnier', 4=>'Fromager', 5=>'Epicier', 6=>'Traiteur',7=>'Boucher', 8=>'Caviste', 9=>'Boulanger');


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
			if($obj->telephoneF): ?>
				<p>Numéro de téléphone : <?php echo $obj->telephoneF; ?></p>
			<?php  endif;
			if($obj->telephoneP):?>
				<p>Numero de portable : <?php echo $obj->telephoneP; ?></p>
			<?php endif;

			if($obj->horaires == "classique"): //Vérification du fait que les horraire concorde avec ceux de la halle?>
				<p>Nous somme ouverts du Mardi au Jeudi de 9h à 13h et de 15h à 19h, le vendredi et le samedi de 9h à 19h et le dimanche de 9h à 12h30.</p></p>
			<?php endif;?>
		</section>
	</article>

	<?php
	if($tab == count($tab)):?>

		<article class="boiteCom col-1-<?php echo ($tab+1)%4; ?>">		
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

function afficherListe($liste,$nomDuChamps){ ?>
	<label class="form-label" for="commModif">Commerçant à modifier</label>
	<select type="text" class="form-control" name="<?php echo $nomDuChamps?>" id=<?php $nomDuChamps ?>>
<?php
			for($i=1; $i<=9; $i+=1):
				$concern = Model::factory('categorie')->find_one($i);
?>
				<optgroup label='<?php echo $concern->nom?>'>
			
<?php			$toShow = Model::factory('Commercants')->where('categorie',$i)->find_many();
				foreach ($toShow as $key=>$elem):?>
					<option><?php echo $elem->nom; ?></option>			
				<?php endforeach; ?>
<?php 		endfor;?>
	</select>
<?php } 

function gestionChamps($nomChamps){
	if(isset($_POST[$nomChamps])){
		return htmlspecialchars($_POST[$nomChamps]); 
	}
	else{
		return NULL;
	}
}

function hashage($toCrypte){
	$toCrypte = hash("sha512", $toCrypte);
	$toCrypte = hash("sha256", $toCrypte);
	$toCrypte = hash("sha512", $toCrypte);
	$toCrypte = hash("sha256", $toCrypte);
	$toCrypte = hash("md5", $toCrypte);
	$toCrypte = hash("sha1", $toCrypte);
	$toCrypte = hash("haval160,4", $toCrypte);
	$toCrypte = hash("sha512", $toCrypte);
	$toCrypte = hash("sha256", $toCrypte);
	$toCrypte = hash("sha512", $toCrypte);
	$toCrypte = hash("sha512", $toCrypte);
	return $toCrypte;
}

?>

