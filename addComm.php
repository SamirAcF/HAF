<?php include 'main.php';
include 'commercant.php';

$corres = array('Primeur' => 1, 'Rotissier' => 2, 'Poissonier' => 3, 'Fromager' => 4, 'Epicier' => 5, 'Traiteur' => 6, 'Boucher' =>7, 'Caviste' => 8, 'Boulanger' => 9 );



$newComm = Model::factory('commercants')->create();

if(isset($_FILE['photoPres'])){
	gestionImg($_FILE['photoPres']);
}
$newComm->nom = htmlspecialchars($_POST['Nom']);
$newComm->categorie = htmlspecialchars($corres[$_POST['Categories']]);
$newComm->site_web = htmlspecialchars($_POST['Site_Web']);
$newComm->description = htmlspecialchars($_POST['Description']);
$newComm->telephone = htmlspecialchars($_POST['Telephone']);
$newComm->email = htmlspecialchars($_POST['Email']);
$newComm->save();;

function gestionImg($img){
	
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