<?php 
session_start();
include 'main.php';
?>

<?php include 'header2.php';?>
<main>
	<?php 	
	if(isset($_SESSION["name"]) && isset($_SESSION["pass"])):?>
	<section>
		<h2>Les Commerçants :</h2>
			<p><a href="NouveauCommercant.php">Ajouter un commerçant</a></p>
			<p><a href="modifComm.php">modifier/supprimer un commerçant</a></p>

		<h2>Les Actualités :</h2>
			<p><a>Ajouter un article</a></p>
			<p><a>Modifier un article</a></p>
		<h2>Utilisateur</h2>
			<p><a href="newUser.php">Nouvel utilisateur</a></p>
			<p><a href="logout.php">Déconnexion</a></p>

	</section>
<?php else:
	include "error.php";
endif;?>
</main>
<footer>
</body>
</html>