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

Différence entre deux dates en jours, heures, minutes secondes :

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

L’approche objet des dates en PHP utilise la classe `DateTime`. Exemple d’instantiation d’un objet : `$d1 = new DateTime()`.
     
    $d1 = new DateTime();
    print_r($d1);

    $d2 = new DateTime('2014-08-15 12:27:30.15632');
    print_r($d2);


L’objet possède des méthodes pour les opérations courantes. Exemple de la fonction `diff` qui permet de faire une comparaison entre les dates :

    $diff = $d2->diff($d1, true);
    print_r($diff);

La fonction `format` quand à elle permet de formater le résultat :

    $d3 = new DateTime('NOW');
    echo $d3->format('Y-m-d h:i:s');

Utilisation avec un *timestamp* UNIX (attention au @) :

    $d4 = new DateTime('@123456');
    echo $d4->format('Y-m-d Hi:s');

Il est également possible de créer une TZ :

    $d5 = new DateTime('@123456', new DateTimezone('Europe/Paris'));
    echo $d5->format('Y-m-d H:i:s');

Attention avec le timestamp UNIX, le résultat reste en UTC

    $d6 = new DateTime('@123456', new DateTimezone('Europe/Paris'));
    echo $d6->format('Y-m-d H:i:s');

UTC contournable en applicant la TZ après la construction du DateTime

    $d6 = setTimezone(new DateTimezone('Europe/Paris'));
    echo $d6->format('Y-m-d H:i:s');

Attention aux dates inférieures ou supérieures à 9999 années (résultat imprévisible)

    $d7 = new DateTime('-8500-08-15');
    echo $d7->format('Y-m-d H:i:s');

    $d8 = new DateTime('-10001-08-15');
    echo $d8->format('Y-m-d H:i:s');

Attention également aux dates nulles de MySQL
    
    $d9 = new DateTime('0000-00-00');
    echo $d9->format('Y-m-d H:i:s');


Il existe une interface procédurale pour les objets date

    $d10 = date_create('@123456');
    print_r($d10);

Fonction `add` :

    $d11 = new DateTime();
    $d11->add(new DateInterval('P1Y3M10DT11H12M15S'));
    echo $d11->format('Y-m-d H:i:s');

    $d12 = new DateTime();

Fonction `modify` :

    $d13 = new DateTime();
    $d13->modify('+1 day');
    echo $d13->format('Y-m-d H:i:s') . PHP_EOL;

Exemple :

     $start = new DateTime();
     $end   = new DateTime();
     $end->modify('+2 month');
     $interval = DateInterval::createFromDateString('Friday of next week');
     $period   = new DatePeriod($start, $interval, $end, DatePeriod::EXCLUDE_STRING);
     print_r($period);
     echo 'Periode : ' . PHP_EOL;
     foreach ($period as $d) {
         echo $d->format('Y-m-d') . PHP_EOL;
     }


## Liens utiles

- [PHP5 : La gestion avancée des dates](http://julien-pauli.developpez.com/tutoriels/php/dates/)