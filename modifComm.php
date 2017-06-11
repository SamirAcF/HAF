<?php 
session_start();
include 'header.php';
?>



	<!-- Si le commerçant à modifier est connu --> 
	<main>
		<?php 	if(isset($_SESSION["name"]) && isset($_SESSION["pass"])){
			if(isset($_POST["A_modif"]) && $_POST['modifier']):
		//$sujet = chercher("nom",$_POST["A_modif"]);
				$sujet = Model::factory('commercants')->where('nom', $_POST["A_modif"])->find_one();
			?>
		<div class="grid grid-pad">
			<form action="traitement.php" method="POST" enctype="multipart/form-data">
				<div class="col-9-12 contenu">
						<h1 class="titreForm">Modifier un commerçant</h1>
						<div>
							<input type="text" name="idCommAModif" value="<?php echo $sujet->id?>" style="display:none;"/>
							<label class="control-label" >Nom du commerce :</label>
							<input type="text" class="form-control" value="<?php echo $sujet->nom; ?>" name="Nom" id="Nom" />
						</div>

						<div>
							<label class="control-label" >Site Web</label>
							<input type="url" class="form-control" name="Site_Web" id="Site_Web" value="<?php echo $sujet->site_web; ?>" />
						</div>
	
						<div>
							<label class="control-label">Categories</label>
							<select type="text" class="form-control" name="Categories" id="Categories">
								<option>Primeur</option>
								<option>Rotissier</option>
								<option>Poissonnier</option>
								<option>Fromager</option>
								<option>Epicier</option>
								<option>Traiteur</option>
								<option>Boucher</option>
								<option>Caviste</option>
								<option>Boulanger</option>
							</select>
						</div>
	
						<div>
							<label class="control-label" >Description</label>
							<input class="form-control" value="<?php echo $sujet->description; ?>" name="Description" id="Description" rows="3"/>
						</div>
	
						<div >
							<?					if($sujet->logo): ?>						
							<img src="<?php echo $sujet->logo; ?>" alt="logo" />
						<?					endif;?>
						<label class="control-label" >Changer la photo :</label>
						<input type="file" class="form-control" name="photoPres" id="photoPres" aria-describedby="helpBlock2">
						</div>
		
						<div >
							<label class="control-label" >Email</label>
							<input type="email" class="form-control" value="<?php echo $sujet->email; ?>" name="Email" id="Email" aria-describedby="helpBlock2">
						</div>
						<div >
							<label class="control-label" >Telephone Fixe</label>
							<input type="text" class="form-control"  value="<?php echo $sujet->telephoneF; ?>" name="TelephoneF" id="Telephone" aria-describedby="helpBlock2">
						</div>
						<div >
							<label class="control-label" >Telephone Portable</label>
							<input type="text" class="form-control" value="<?php echo $sujet->telephoneP; ?>" name="TelephoneP" id="Telephone" aria-describedby="helpBlock2">
						</div>

					<input classe="btn btn-default" type="submit" value="submit" />
			</div>
		</form>
	</div>
	<?php
	elseif(isset($_POST["A_modif"]) && $_POST['supprimer']):
		?>
	Le commerçant a bien été supprimé de la liste.
	<?php 

	$sujet = Model::factory('commercants')->where('nom', $_POST["A_modif"])->find_one();
	$sujet->delete();
	header( 'Location: ./modifComm.php' ) ;
	?>

<?php else: ?>	
	<div class="grid grid-pad" >
		<section id="formulaireshow">
			<div class="col-9-12 contenu">
				<h1 class="titreForm">Commercants</h1>
				<div class="col-9-12">
					<form action="modifComm.php" method="POST">
						<?php afficherListe($ensembleComm,"A_modif");?>
						<input type="submit" name="modifier" value="Modifier" />
						<input type="submit" name="supprimer" value="Supprimer le commerçant"/>
					</form>
				</div>
			</div>
		</section>
	</div>
				<?php endif; 
		}//fermeture du if de detection de session
		else{
			$error = "Vous n'êtes pas connecté !";
			$erreurCo = true;
			include "error.php";
			}?>


	</main>

</body>
</html>


