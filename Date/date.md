# Dates PHP

Passage des anciennes fontions procédurales à des objets depuis PHP5 qui évitent d’avoir recours à un passage par `timestamp` pour la manipulation des dates dans la plupart des cas.

## Fonctions de date procédurales

- `time()` : affiche le *timestamp*.
- `date('Y-m-d')` : affiche la date au format ISO en fonction de la timezone (`tz`) sélectionnée sur le serveur au niveau de `php.ini` ET du serveur via la commande `tzselect`. Il est possible de récupérer la timezone utilisée via la commande `date_default_timezone_get()`.
- `gmdate('Y-m-d')` : équivalente à la précédente mais utilise le méridien de Greenwich.

Les deux fonctions précédentes peuvent être utilisées avec un paramètre de *timestamp* UNIX, ex : `date('Y-m-d H:i:s', 125545)`.

Il est possible de générer le *timestamp* à partir d’une date avec la fonction `mktime()`.
De manière similaire, il existe une fonction `gmmktime` pour générer à partir de GMT.

Le script suivant permet de vérifier que les timezones correspondent :

    if (strcmp(date_default_timezone_get(), ini_get('date.timezone'))) {
        echo 'Tz du script différente de la TZ globale' . PHP_EOL;
    } else {
        echo 'Tz du script et TZ globale identiques' . PHP_EOL;
    }

### Format de dates

- `Y-m-D H:i:s` donnera "2014-08-Mon 12:30:00".
- `Y-m-j H:i:s` donnera "2014-08-18 12:30:00".
- `l jS m Y \a\t H:i:s` donnera "Monday 18th 08 2014 at 12:30:00".
- `N` donnera "1". Représentation numérique ISO-8601 du jour de la semaine (ajouté en PHP 5.`1.0`).
- `z` donnera "229". Jour de l’année.

### Locales

Une “Locale” est un identifiant utilisé pour représenter les comportements régionaux d’une API. Les locales PHP sont organisées et identifiées de la même manière que les CLDR de ICU (et que de nombreux autres éditeurs de système Unix, tels que Mac, Java, etc.). Les locales sont identifiées par les libellés de langage de la RFC 4646 (qui utilise des tirets et pas des soulignés) en plus de la notation traditionnelle avec des soulignés. Sauf contre-indication, les fonctions de cette classe sont capables d’utiliser les deux notations.

La définition de la locale se fait via la fonction `setlocale()`, exemple : `setlocale(LC_ALL, "fr-FR@euro")`.

Exemple avec la fonction `strftime` qui formate une date/heure locale avec la configuration locale : `strftime('%A %d %B %Y')`.

`strtotime()` Transforme un texte anglais en timestamp. Exemple : `strftime('%A %d %B %Y', strtotime('07/18/2013'))`.


### Opérations sur les dates en procédural


Différence entre deux dates en Jours, heures, minutes secondes :

    $d1 = '2014-08-08 03:25:47';
    $d2 = '2014-04-13 05:28:13';

    $t1 = strtotime($d1);
    $t2 = strtotime($d2);

    $diffs   = abs($t2 - $t1);
    $seconds = $diffs % 60;
    $tmp     = floor(($diffs - $seconds) / 60);
    $minutes = $tmp % 60;
    $tmp     = floor(($tmp - $minutes) / 60);
    $hours   = $tmp % 24;
    $days    = floor(($tmp - $hours) / 24);




## Approche objet



