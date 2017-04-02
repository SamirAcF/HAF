<?php
/*//$con = mysql_connect("mysql-slokilla.alwaysdata.net/slokillaHaF", "slokilla", "samir");
try{
 $con = new PDO('mysql:host=mysql-slokilla.alwaysdata.net;dbname=slokilla_haf', 'slokilla', 'samir');
}
catch(Exeption $e){
	die('Erreur : '.$e-> getMessage());
}

//AFFECTATIONS

 
$con->exec('INSERT INTO commercants(description,email,horaires,im_banniere,im_profil,info_supplementaires,logo,nom,site_web,telephone) 
	VALUES(\'$_POST[Description]\',\'$_POST[Email]\',\'$_POST[Horaires]\',\'$_POST[Banniere]\',\'$_POST[Profil]\',\'$_POST[Info_Supplementaires]\',\'$_POST[Logo]\',\'$_POST[Nom]\',\'$_POST[Site_Web]\',\'$_POST[Telephone]\')');

echo('succes');

header('Location: commercant.php?sent=1');*/

try { 
  $bdd = new PDO('mysql:dbname=slokilla_haf;host=mysql-slokilla.alwaysdata.net', 'slokilla', 'samir');
}catch(Exception $e){
  die('Erreur : ' . $e->getMessage());
}

$query = $bdd->prepare('INSERT INTO commercants(description,email,horaires,im_banniere,im_profil,info_supplementaires,logo,nom,site_web,telephone) 
	VALUES(\'$_POST[Description]\',\'$_POST[Email]\',\'$_POST[Horaires]\',\'$_POST[Banniere]\',\'$_POST[Profil]\',\'$_POST[Info_Supplementaires]\',\'$_POST[Logo]\',\'$_POST[Nom]\',\'$_POST[Site_Web]\',\'$_POST[Telephone]\')');
$query->execute(array(
  'nom' => $_POST[Nom],
  'description' => $_POST[Description],
  'email' => $_POST[Email],
  'horaires' => $_POST[Horaires],
  'im_banniere' =>$_POST[Banniere],
  'im_profil' => $_POST[Profil],
  'info_supplementaires' => $_POST[Info_Supplementaires],
  'logo' => $_POST[Logo],
  'nom' => $_POST[Nom],
  'site_web' => $_POST[Site_Web],
  'telephone' => $_POST[Telephone],
 ));
echo('succes');

?>
<a href='..'>fdjsfsjdqklfjsdqkmfsdmklqfjsdklqfjskldqfjkldq</a> 