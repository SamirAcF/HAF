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
	<link rel="stylesheet" type="text/css" href="style/style_formulaire.css">
	<link rel="stylesheet" type="text/css" href="style/simplegrid.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 
	<!-- bootstrap ccs -->
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
</head>
<body>
	<!-- HEADER--> 
	<header>
		<div class="grid grid-pad">
			<div class="col-2-12">
				<div class="content2">
					<img src="http://www.leshalles-amiens.fr/hallefrais/images/home/logo-halle.png" class="logo" alt="logo">
				</div>
			</div>
			<div class="col-10-12">
				<div class="content3">
					<nav>
						<ul id="menu">
							<li><a href="#" class="onglet">LA HALLE</a></li> <!-- &nbsp == espace insécable -->
							<li><a href="#" class="onglet">LES COMMERÇANTS</a></li>
							<li><a href="#" class="onglet">ACTUALITÉS</a></li>
							<li><a href="#" class="onglet">INFO/CONTACT</a></li>
						</ul>	
					</nav>	
				</div>
			</div>
		</div>
	</header>
	<!-- Si le commerçant à modifier est connu --> 
	<main>
		<?php if(isset($_POST['user'])):
			$newUser = Model::factory('admin')->create();
			$newUser->user = gestionChamps('user');
			$newUser->pass = gestionChamps('pass');
			echo $newUser->user;
			echo $newUser->pass;
			$newUser->save();
		?>

		<?php else: ?>	
			<div class="grid grid-pad" >
				<section id="formulaireshow">
				<div class="col-9-12">
						<h1>Créer un nouvel utilisateur</h1>
					<div class="col-9-12">
					<form action="newUser.php" method="POST">
						<label for='user'>Nom D'utilisateur : </label><input type="text" name="user">
						<label for='pass'>Mot de passe : </label><input type="text" name="pass">
						<input type="submit" name="supprimer" value="Créer"/>
					</form>
		<?php endif; ?>
	</main>
	<footer>
	<div class="grid grid-pad">
		<div class='col-1-1'>
			<img src="logo-halle_footer.png" class="logoFooter col-1-3" alt="logo">
			<ul id="footerMenu" class="col-1-3">
				<li><a href="#" class="onglet">LA HALLE</a></li> <!-- &nbsp == espace insécable -->
				<li><a href="#" class="onglet">LES COMMERÇANTS</a></li>
				<li><a href="#" class="onglet">ACTUALITÉS</a></li>
				<li><a href="#" class="onglet">INFO/CONTACT</a></li>
			</ul>
		</div>
	</div>

	<div class='col-1-1'>
		<p class='droits'>&copy;Halle au Frais 2017</p>
	</div>

</footer>
		</body>
		
<script type="text/javascript">
	function test(){
		alert("hello world");
	}
</script>

		</html>


