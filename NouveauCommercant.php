<?php 
session_start();
include 'header.php';
?>

	<!-- CORPS DU SITE --> 
	<!--FORMUALIRE VALIDE-->

	<?php 

if (isset($_POST['Site_Web'])) {

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

include "success.php";

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
		
		if($erreur == 0){ // si erreur vaut encore 0, c'est qu'il n'y en a pas eu

			$struct ="./images/".$cat."/".$nom."/";

			if(mkdir($struct, 0777, true)){
				$nom = $struct."photoPres.".$extension_upload;
				$resultat = move_uploaded_file($img['tmp_name'],$nom);
				return $nom;
			}
		}
	}

}
?>

	<!-- FORMULAIRE A REMPLIR -->

<?php 	if(isset($_SESSION["name"]) && isset($_SESSION["pass"])): ?>

	<main>
		<div class="grid grid-pad" >
			<section id="formulaireshow">
				<div class="col-9-12 contenu">
					<h1 class="titreForm">Commercants</h1>
					<div class="col-9-12">
						<form action="addComm.php" method="POST" enctype="multipart/form-data">
							<div class="content">
								<article class="content1">
									<div >
										<label class="control-label" >Nom du commerce :</label>
										<input type="text" class="form-control" placeholder="Nom" name="Nom" id="Nom" aria-describedby="helpBlock2">
										<span id="helpBlock2" class="help-block"></span>
									</div>
									<div >
										<label class="control-label" >Site Web</label>
										<input type="url" class="form-control" name="Site_Web" id="Site_Web" placeholder="www"  aria-describedby="helpBlock2">
										<span id="helpBlock2" class="help-block"></span>
									</div>

									<div>
										<label class="control-label" for="Categories">Categories</label>
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

									<div >
										<label class="control-label" >Description</label>
										<input class="form-control" name="Description" id="Description" rows="3">Description</input>
									</div>
									<div>
										<label class="control-label" >Nom du commerce :</label>
										<input type="text" class="form-control" placeholder="Nom du gérant" name="Gérant" id="Gérant" aria-describedby="helpBlock2">
										<span id="helpBlock2" class="help-block"></span>
									</div>

									<div >
										<label class="control-label" >Photo de présentation</label>
										<input type="file" class="form-control" name="photoPres" id="photoPres" aria-describedby="helpBlock2">
									</div>

									<div >
										<label class="control-label" >Email</label>
										<input type="email" class="form-control" placeholder="xyz@email.fr" name="Email" id="Email" aria-describedby="helpBlock2">
									</div>
									<div >
										<label class="control-label" >Telephone Fixe</label>
										<input type="text" class="form-control"  placeholder="0123456789" name="TelephoneF" id="Telephone" aria-describedby="helpBlock2">
									</div>
									<div >
										<label class="control-label" >Telephone Portable</label>
										<input type="text" class="form-control"  placeholder="0123456789" name="TelephoneP" id="Telephone" aria-describedby="helpBlock2">
									</div>

									<input class="btn btn-default " type="submit" value="submit" />
								</div>
							</article>
						</div>
					</form>
				</div>
			</nav>
		</div>
	</main>
<?php 	else: 
			$error = "Vous n'êtes pas connecté !";
			$erreurCo = true;
			include 'error.php';
		endif;
?>

</body>
</html>


