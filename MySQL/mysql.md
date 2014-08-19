# MySQL

## Clients MySQL
- [Workbench](http://www.mysql.fr/products/workbench/) appli multiplateforme, gratuit, open-source
- [PhpMyAdmin](http://www.phpmyadmin.net/home_page/index.php) interface web, gratuit, open-source
- [Sequel Pro](http://www.sequelpro.com) appli mac, gratuit, open-source
- [DBBeaver](http://dbeaver.jkiss.org) appli multiplateforme, gratuit, open-source

## Moteurs de tables

- MyISAM : séquentiel, très bien pour le web standard (beaucoup de lectures, peu d’écritures). Très mauvais en perf si beaucoup d’écritures.
- InnoDB : riche en fonctionnalités.
- ndbcluster : seul à permettre de faire du cluster mais manque de fonctionnalités
- MEMORY : pour données peu importantes, qu’on peut se permettre de perdre. Marche en RAM donc très performant. Pratique pour stocker sessions utilisateurs par exemple.
- CSV : peut être utile pour gérer des fichiers CSV sans besoin particulier d’indexation.

## Interface MySQL

- `mysql_query` & cie : déprécié.
- `mysqli_query` & cie : objet et procédural
- PDO 

### MySQLi - procédural

Exemple de connexion :

    $link = mysqli_connect('127.0.0.1', 'project', '0000', 'project');
    if (!$link) {
        echo 'Erreur de connexion MySQL';
        echo mysqli_connect_error() . PHP_EOL;
    } else {
        echo mysqli_get_host_info($link);
    }
    mysqli_close($link);


