<?php 
session_start();
include 'main.php';
?>

<?php include 'header.php';?>
<main>
	<?php 	
	if(isset($_SESSION["name"]) && isset($_SESSION["pass"])):?>
	<section>
		<h2>Les Commerçants :</h2>
			<p><a href="newComm.php">Ajouter un commerçant</a></p>
			<p><a href="modifComm.php">modifier/supprimer un commerçant</a></p>

		<h3>Les Commerçants :</h3>

	</section>
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
</html>