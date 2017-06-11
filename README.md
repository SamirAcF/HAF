Site de la Halle Au Frais
=========================
Projet web 2017 - Année Spéciale
----------------------------------

La principale idée dans la réalisation de ce site web est de présenter à l'utilisateur final une interface la plus épurée et la plus simple possible.

Pour se faire, on base notre site sur une librairie Javascript : *fullpage.js*. 

Cette librairie permet de forcer l'utilisateur à défiler de section en section, tout en sachant qu'une section représente une entité qu'on pourrait apparenté à une page dans une architecture classique.

####Fonctionnalités mises en place :

* Navigation section par section avec le défilement de la souris, les flèches du clavier ainsi qu'avec le defilement sur plateforme portables
* Mode administration accessible depuis le bas de chaque section 
* Ajouter, supprimer et modifier des commerçants
* Possibilité d'ajouter une image pour un commerçant (qui sera dans le dossier __/images/*Categorie du commerçant*/*Nom du commerçant*)__
* Ajouter des utilisateurs
* Position géographique implémentée
* Liste des commerçants dynamique (changement automatique de la page principale en cas de modification de la liste de ocmmerçants)

####Fonctionnalités en cours d'implémentation ou prévues incéssement sous peu :

* Formulaire de contact (bug au niveau de l'utilisation de swift Mailer)
* Gestion des Actualités similaire à celle des commerçants
* Enbellissement de l'affichage des commerçants
* Version responsive de l'interface utilisateur (l'affichage des commerçant n'étant final, il est difficile de le rendre responsive)

####Choix :

* Nous n'utilisons pas de Cookies pour des raisons simples :
** Déjà, l'administrateur n'as pas besoin d'être connecté H24
** Ensuite, Si une personne accède à la machine de l'administrateur, il pourra détruire la base de données
* Nous n'utilisons pas Flight car l'intégration de ce dernier n'aurait pas été un apport phénomale à cause de la philosophie Single Page. De plus son intégration aurait mis un certain temps pour peu d'apport.