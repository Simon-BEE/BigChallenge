# CHALLENGE 
## *18/04/2019 au 23/04/2019*
### Page Boutique + Form inscription + Form connexion + Prise de commande + accès espace client avec affichage des commandes liée à celui-ci.
Pour ce défis vous allez devoir créer une “petite boutique” de bières en ligne. En partant du site bière actuel, il vous faudra séparer les bières du formulaire de manière à que le site ressemble à cela au final : 

Page Biere => Compte ? FormConnexion : FormInscription=>FormAdresse(Prérempli)=>Confirmation de commande.
## 1. Rendre le site bière responsive
Peu importe la technologie employée.
## 2. Mettre tableau bière en bdd puis récupérer les données pour les afficher
* Créer une table nommée “bières
* Lui assigner autant de colonnes que nécessaire
* Y insérer les données du tableau bière (Interdiction de rentrer les donnée à la main dans phpmyadmin)
## 3. Création du formulaire d’inscription
Créez un formulaire contenant les champs suivants:
* Nom
* Prénom
* Adresse
* Code postale
* Ville
* Pays
* Téléphone
* Mail
* Mot de passe
## 4. Mise en fonction du formulaire d’inscription
Créez un nouvel utilisateur en bdd à chaques inscriptions
## 5. Création du formulaire de connexion
Créez un formulaire contenant les champs suivants:
* Adresse mail
* Mot de passe
## 6. Mise en fonction du formulaire de connexion
Vérifiez les données reçu puis établir ou non la connexion
## 7. Création espace client
Créer un espace client html5 qui présentera:
* Une possibilité de modifier ses données personnelles hors adresse mail.
* Un tableau affichant le contenu des commandes passées par l’utilisateur.
* Numéro de commande
* Nombre de référence produit
* Prix total de la commande
## 8. Petite aide
* La table commande disposera de 3 colonnes:
    * id(int)
    * id_client(int)
    * ids_product(text)
* Pour la colonne ids_product, il vous sera nécessaire de lui envoyer un tableau contenant les ids de tous les produits commandés. Pour ce faire vous aurez besoin d’utiliser la methode serialize :  [Serialize](https://www.php.net/manual/fr/function.serialize.php)
* Et bien sûr il vous faudra également une méthode pour réutiliser ce tableau une fois récupéré de la bdd. Je vous laisse chercher !
# TODO
- [x] Structure HTML
- [x] Mise en forme CSS / responsive
- [x] Implanter tableau des bières dans la bdd
- [x] Ajout nouveau utilisateur dans une table dans la bdd
- [x] Faire fonctionner le système de connexion
- [x] Pouvoir modifier ses informations perso
- [x] Tableau récap des commandes
- [x] Vérifier toutes les fonctionnalités
- [ ] Vérifier les potentielles failles
# Installation
* Remplir les variables du config_sample.php avec les valeurs correspondantes puis renommer ce fichier en config.php
* Modifier certaines url qui sont en absolu