<?php 
session_start();
include 'main.php';

$corres = array('Primeur' => 1, 'Rotissier' => 2, 'Poissonnier' => 3, 'Fromager' => 4, 'Epicier' => 5, 'Traiteur' => 6, 'Boucher' =>7, 'Caviste' => 8, 'Boulanger' => 9 );



$commAmod = Model::factory('commercants')->find_one($_POST['idCommAModif']); //Création d'un champs 

if(($_FILES['photoPres']) && isset($_POST['Categories']) && isset($_POST['Nom'])){ // si une photo de présentation a été uploadée, on la traite. On demand cat et nom pour l'organisation.
	$logo = gestionImg($_FILES['photoPres'], $_POST['Categories'], $_POST['Nom']); // $nom
	if($logo) $commAmod->logo = $logo;
}

// on échappe l'HTML pour éviter les injections de scripts

$commAmod->nom = gestionChamps('Nom');
$commAmod->categorie = htmlspecialchars($corres[$_POST['Categories']]);
$commAmod->site_web = gestionChamps('Site_Web');
$commAmod->description = gestionChamps('Description');
$commAmod->telephoneF = gestionChamps('TelephoneF');
$commAmod->telephoneP = gestionChamps('TelephoneP');
$commAmod->email = gestionChamps('Email');
$commAmod->save();


function gestionChamps($nomChamps){
	if(isset($_POST[$nomChamps])){
		return htmlspecialchars($_POST[$nomChamps]); 
	}
	else{
		return NULL;
	}
}

function gestionImg($img,$cat,$nom){
	$erreur = 0;
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' ); // on crée le tableau contenant les types autorisés 
	/*if ($_FILES['icone']['size'] > $maxsize){ // on vérifie que le fichier ne dépasse le poids max autorisé
		$erreur = "Le fichier est trop gros";
	}*/
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($img['name'], '.')  ,1)  );
	if (in_array($extension_upload,$extensions_valides) ){
		$erreur= 0;
	} 
	else{
		$die('incompatibilité');
	}
	
	if($erreur == 0){ // si erreur vaut encore 0, c'est qu'il n'y en a pas eu

		$struct ="./images/".$cat."/".$nom."/";
		if(!is_dir($struct)){
			mkdir($struct, 0777, true);
		}	
		$nom = $struct."photoPres.".$extension_upload;
		$resultat = move_uploaded_file($img['tmp_name'],$nom);
		return $nom;
	}
	else echo $erreur; // sinon on retourne l'erreur.
}

?>
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

</head>
<body>
	Transfert réussi !
</body>
</html>