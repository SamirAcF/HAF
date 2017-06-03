<?php 
session_start();
include 'main.php';
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
		<link rel="stylesheet" type="text/css" href="style/bootstrap.css"/>
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

<?php 
		if(isset($_SESSION["name"]) && isset($_SESSION["pass"])): 
?>	
			Vous êtes déjà connecté !
<?php 	elseif(isset($_POST['username']) && isset($_POST['pw'])):
			$user = Model::factory('admin')->where('user',$_POST["username"])->find_one();
			if($user->pass == hash("sha512",$_POST['pw'])){
				$_SESSION['name'] = $_POST['username'];//on stock le nom de l'utilisateur
				$_SESSION['pass'] = sha1($_POST['pw']);
				include "success.php";
			}else{ 
				affiche(TRUE);	
  			}


?>
<?php	else: 
	affiche(FALSE);
	endif;

function affiche($flag){ ?>
<div class="grid grid-pad" >
	<section id="formulaireshow">
		<div class="col-9-12">
				<h1>Commercants</h1>
			<div class="col-9-12">
<?php 			if($flag):?>
				<div class="errorInPage">
					<p> Le mot de passe rentré est incorrect </p>
				</div>
<?php 	endif ?>
				<form action='login.php' method="POST">
					<label for="username">Nom d'utilisateur : </label><input type="text" name="username"/>
					<label for="pw">Mot de passe : </label><input type="password" name="pw"/>
					<input type="submit" name="valider">
				</form>
			</div>
		</div>
	</section>
</div> 
<?php } ?>

	</body>
</html>
