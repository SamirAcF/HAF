<?php 
session_start();
include 'header.php';
?>

<?php 
		if(isset($_SESSION["name"]) && isset($_SESSION["pass"])): 
			$error = "Vous êtes déjà connecté !";
			$erreurCo = false;
			include "error.php";
		elseif(isset($_POST['username']) && isset($_POST['pw'])):
			$user = Model::factory('admin')->where('user',$_POST["username"])->find_one();
			if($user->pass == hashage($_POST['pw'])){
				$_SESSION['name'] = $_POST['username'];//on stock le nom de l'utilisateur
				$_SESSION['pass'] = hashage($_POST['pw']);
				include "success.php";
			}else{ 
				affiche(TRUE);	
  			}


?>
<?php	else: 
	affiche(FALSE);
	endif;

function affiche($flag){ ?>
		<main>
			<div class="grid grid-pad" >
				<section id="formulaireshow">
					<div class="col-9-12 contenu">
							<h1 class="titreForm">Connexion</h1>
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
		</main>
<?php } ?>

	</body>
</html>
