<?php include 'main.php';
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
		<?php if(isset($_POST["A_modif"]) && $_POST['modifier']):
		//$sujet = chercher("nom",$_POST["A_modif"]);
$sujet = Model::factory('commercants')->where('nom', $_POST["A_modif"])->find_one();
		?>

			<form action="traitement.php" method="POST" enctype="multipart/form-data">
				<div class="content">
				<article class="content1">
					<div>
					<input type="text" name="idCommAModif" value="<?php echo $sujet->id?>" style="display:none;">
					 <label class="control-label" >Nom du commerce :</label>
					 <input type="text" class="form-control" value="<?php echo $sujet->nom; ?>" name="Nom" id="Nom" aria-describedby="helpBlock2">
					 <span id="helpBlock2" class="help-block"></span>
					</div>
					<div >
					  <!--<label class="control-label" >Logo</label>
					  <input type="text" class="form-control" name="Logo" id="Logo" placeholder="liens vers votre logo" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block"></span>
					</div>-->
					<div >
					  <label class="control-label" >Site Web</label>
					  <input type="url" class="form-control" name="Site_Web" id="Site_Web" value="<?php echo $sujet->site_web; ?>" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block"></span>
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

					<div >
						<label class="control-label" >Description</label>
						<input class="form-control" value="<?php echo $sujet->description; ?>" name="Description" id="Description" rows="3">Description</input>
					</div>

					<!--
					<div >
					  <label class="control-label" >Info Supplementaires</label>
					  <input type="text" class="form-control" name="Info_Supplementaires" id="Info_Supplementaires" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block"></span>
					</div>
					-->
					<div >
						<img src="<?php echo $sujet->logo; ?>" alt="logo" />
					  	<label class="control-label" >Changer la photo :</label>
					  	<input type="file" class="form-control" name="photoPres" id="photoPres" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block">bite</span>
					</div>
					<!--
					<div >
					  <label class="control-label" >Banniere</label>
					  <input type="text" class="form-control" name="Banniere" id="Banniere" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block"></span>
					</div>-->

					<div >
					  <label class="control-label" >Email</label>
					  <input type="email" class="form-control" value="<?php echo $sujet->email; ?>" name="Email" id="Email" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block"></span>
					</div>
					<div >
					  <label class="control-label" >Telephone Fixe</label>
					  <input type="text" class="form-control"  value="<?php echo $sujet->telephoneF; ?>" name="TelephoneF" id="Telephone" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block"></span>
					</div>
					<div >
					  <label class="control-label" >Telephone Portable</label>
					  <input type="text" class="form-control" value="<?php echo $sujet->telephoneP; ?>" name="TelephoneP" id="Telephone" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block"></span>
					</div>
					<!--<div >
					  <label class="control-label" >Horaires</label>
					  <input type="time" class="form-control" id="Horaires" name="Horaires" aria-describedby="helpBlock2">
					  <span id="helpBlock2" class="help-block"></span>
					</div>-->
					<input type="submit" value="submit" />
			<from/>


					<!--   simplecaptcha
					       <img src="/stickyImg" />
					    <form action="/captchaSubmit.jsp" method="post">
					    <form action="/captcha.jsp" method="post">
					        <input name="answer" />
					    </form>
					        <audio controls autoplay src="/audio.wav"></audio>
					    <form action="/captchaSubmit.jsp" method="post">
					        <input name="answer" />
					    </form>
					    -->
<!-- 
	<article >
		<div class="col-9-12">
     		<div id="pagination_position">
				  <ul class="pagination">
				    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
				    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
				    <li class="active"><a href="#">2 <span class="sr-only">(current)</span></a></li>
				    <li class="active"><a href="#">3 <span class="sr-only">(current)</span></a></li>
				    <li class="active"><a href="#">4 <span class="sr-only">(current)</span></a></li>
				    <li class="active"><a href="#">5 <span class="sr-only">(current)</span></a></li>
				    <li class="active"><a href="#">6 <span class="sr-only">(current)</span></a></li>
				    <li class="active"><a href="#">7 <span class="sr-only">(current)</span></a></li>
				    <li class="active"><a href="#">8 <span class="sr-only">(current)</span></a></li>
				  </ul>	
			</div>
		<div>
	</article>
--> 

</div>
</nav>
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
				<div class="col-9-12">
						<h1>Commercants</h1>
					<div class="col-9-12">
					<form action="modifComm.php" method="POST">
						<?php afficherListe($ensembleComm,"A_modif");?>
						<input type="submit" name="modifier" value="Modifier" />
						<input type="submit" name="supprimer" value="Supprimer le commerçant"/>
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

