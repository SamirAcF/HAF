<?php 
session_start();
require('main.php');
require('config.php');
require("libs/swift/swift_required.php");
?>

<?php 
		$index = null;
		$active = "class=\"active\"";
		if($_SERVER['PHP_SELF'] != "/index.php")
			$index = "index.php";
			$active = null;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenue sur le site de la Halle au Frais</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/normalize.css">
	<link rel="stylesheet" type="text/css" href="style/simplegrid.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style/style2.css">
	<link rel="stylesheet" type="text/css" href="style/jquery.fullPage.css"/>
	
	<script type="text/javascript" src="libs/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="libs/jquery-ui.js"></script>
	<script type="text/javascript" src="libs/jquery.fullPage.min.js"></script>
	<script type="text/javascript" src="libs/jquery.fullpage.extensions.min.js"></script>
	<script type="text/javascript" src="libs/bootstrap.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:300,400,200" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body>

<!-- HEADER--> 
<?php 	
		if(isset($_SESSION["name"]) && isset($_SESSION["pass"])):?>
		<div class="admin">
			<a href="admin.php"><img src="images/admin.png" alt='gestion'/></a>
		</div>
<?php endif ?> 	
	<header id='header'>
		<div class="grid grid-pad">
			<div class="col-1-1">
				<nav id=myMenu>
					<ul>
						<li data-menuanchor="Accueil" <?php echo $active ?>><a href="<?php echo $index ?>#Accueil">LA HALLE</a></li> |
						<li data-menuanchor="Commercants"><a href="<?php echo $index ?>#Commercants">LES COMMERÇANTS</a></li> |
						<li data-menuanchor="News"><a href="<?php echo $index ?>#News">ACTUALITÉS</a></li> |
						<li data-menuanchor="Infos"><a href="<?php echo $index ?>#Infos">INFORMATIONS</a></li>  |
						<li data-menuanchor="Contact"><a href="<?php echo $index ?>#Contact">CONTACT</a></li> 
					</ul>
				</nav>	
			</div>
		</div>
	</header>