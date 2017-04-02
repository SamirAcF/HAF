<?php 
function afficheCom($nom,$commerce,$cheminImage,$desc){?>
	<div class="slide">
		<article class=" boiteCom">
			<header class="Hcommercant">
				<h2><?php echo $nom; ?> le <?php echo $commerce?></h2>
			</header>
			<section class='dispCom'>
				<img class='imageCom' src='<?php echo $cheminImage;?>' />
				<p class="descCom"><?php echo $desc; ?></p>
			</section>
		</article>
	</div><?php
}
?>