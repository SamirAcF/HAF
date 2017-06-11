<?php 
session_start();
include 'header.php';
?>


	<main>
			<?php if(isset($_POST['user'])):
				$newUser = Model::factory('admin')->create();
				$newUser->user = gestionChamps('user');
				$newUser->pass = hashage(gestionChamps('pass'));
				$newUser->save();

				include "success.php";
			?>

			<?php else: ?>	
				<div class="grid grid-pad" >
					<section id="formulaireshow">
						<div class="col-9-12 contenu">
							<h1 class="titreForm">Créer un nouvel utilisateur</h1>
							<div class="col-9-12">
								<form action="newUser.php" method="POST">
									<label for='user'>Nom D'utilisateur : </label><input type="text" name="user" class="form-control">
									<label for='pass'>Mot de passe : </label><input type="password" name="pass" class="form-control">
									<input type="submit" name="create" value="Ajouter" class="form-control"/>
								</form>
							</div>
						</div>
					</section>
				</div>
			<?php endif; ?>
	</main>
</html>


