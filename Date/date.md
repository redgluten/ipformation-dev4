# Dates PHP

Passage des anciennes fontions procédurales à des objets depuis PHP5 qui évitent d’avoir recours à un passage par `timestamp` pour la manipulation des dates dans la plupart des cas.

## Fonctions de date procédurales

- `time()` : affiche le *timestamp*
- `date('Y-m-d')` : affiche la date au format ISO en fonction de la timezone (`tz`) sélectionnée sur le serveur au niveau de `php.ini` ET du serveur via la commande `tzselect`.


