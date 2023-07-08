# Micro Framework PHP sans package externes

Permet de créer des applciation de bases en PHP de type :
Route > Controller > Vue

> La branche main n'est pas terminée : je teste la mise en place d'un "autoloader" pour passer les arguments automatiquement aux méthodes des controllers.

La branche fonctionnelle à utiliser est **Sans-Autoloader**

## `dump()`
Permet de faire un var_dump plus visuel des variables

## `.env`
Pour déclarer les variables globales : lecture intégrée du .env

## Connexion à la BDD
Les données se trouvent dans le `.env`

## How To
1. Créer un Controller avec les méthodes voulues dans le dossier `php/Controller/``
2. Renseigner le nom de la route dans `Routing/Routes.php` avec le Controller et la Méthode associée


