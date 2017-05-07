<?php include 'main.php';




$newComm = Model::factory('commercants')->create(); //Création d'un champs 

if(($_FILES['photoPres']) && isset($_POST['Categories']) && isset($_POST['Nom'])){ // si une photo de présentation a été uploadée, on la traite. On demand cat et nom pour l'organisation.
	$logo = gestionImg($_FILES['photoPres'], $_POST['Categories'], $_POST['Nom']); // $nom
	if($logo) $newComm->logo = $logo;
}

// on échappe l'HTML pour éviter les injections de scripts

$newComm->nom = gestionChamps('Nom');
$newComm->categorie = htmlspecialchars($corres[$_POST['Categories']]);
$newComm->site_web = gestionChamps('Site_Web');
$newComm->description = gestionChamps('Description');
$newComm->telephoneF = gestionChamps('TelephoneF');
$newComm->telephoneP = gestionChamps('TelephoneP');
$newComm->email = gestionChamps('Email');
$newComm->gerant = gestionChamps('Gerant');
$newComm->save();

echo "fdsfdfd".$newComm->nom;

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
		//$die('incompatibilité');
	}
	
	if($erreur == 0){ // si erreur vaut encore 0, c'est qu'il n'y en a pas eu

		$struct ="./images/".$cat."/".$nom."/";

		if(mkdir($struct, 0777, true)){
			//$nom = "images/{$cat}/{$nom}/imagePres.{$extension_upload}"; // on crée le répertoire dans lequel l'image sera envoyée
			$nom = $struct."photoPres.".$extension_upload;
			$resultat = move_uploaded_file($img['tmp_name'],$nom);
			return $nom;
		}
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
	<p>Transfert réussi !</p>
</body>
</html>