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
        echo mysqli_get_host_info($link) . PHP_EOL;
    }
    mysqli_close($link);

Fetch de la base :

    $result = mysqli_query($link, 'SELECT * FROM user');
    while ($row = mysqli_fetch_assoc($result)) {
        var_dump($row);
    }

### MySQLi - objet

    $mysqli = new mysqli('127.0.0.1', 'project', '0000', 'project');
    if ($mysqli->connect_error) {
        echo 'Erreur de connexion MySQL' . PHP_EOL;
        echo $mysqli->connect_error . PHP_EOL;
    } else {
        $result = $mysqli->query('SELECT * FROM user');
        while ($row = $result->fetch_object()) {
            echo $row->user_name . PHP_EOL;
        }
        $result->close();
    }
    unset($mysqli);

### PDO

    $dsn     = "mysql:dbname=project;host=127.0.0.1";
    $options = array(
        PDO::ATTR_TIMEOUT => 2, 
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    try {
        $pdo = new PDO($dsn, 'project', '0000', $options);
    } catch (PDO_Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }

    $sql = "SELECT * FROM user";
    $stm = $pdo->query($sql);
    $rowSet = $stm->fetchAll();

    foreach ($rowSet as $user) {
        echo $user->user_name . PHP_EOL;
    }

    var_dump($stm->fetchAll());