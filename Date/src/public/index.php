<?php

echo '<h1>Dates en PHP </h1>';

// La définition d’un tz est obligatoire (à faire de préférence dans le php.ini)
//ini_set('date.timezone', 'Europe/Paris');
// Alternativement
//date_default_timezone_set('Europe/Paris');

// Vérifier que les timezones correspondent
if (strcmp(date_default_timezone_get(), ini_get('date.timezone'))) {
    echo 'Tz du script différente de la TZ globale' . PHP_EOL;
} else {
    echo 'Tz du script et TZ globale identiques' . PHP_EOL;
}



echo '<pre>';


// Afficher timestamp avec PHP
echo time() . PHP_EOL;

// Afficher date avec PHP en se basant sur la timezone actuelle
echo date('Y-m-d H:i:s') . PHP_EOL;

// Afficher date GMT (Greenwich Mean Time) avec PHP
echo date('Y-m-d H:i:s') . PHP_EOL;

// Peut être utilisé avec un paramètre de timestamp UNIX
echo date('Y-m-d H:i:s', 125545) . PHP_EOL; // ATTENTION !
echo gmdate('Y-m-d H:i:s', 125545) . PHP_EOL;

// Générer le timestamp à partir d’une date
echo mktime(10,30,0,8,18,2014) . PHP_EOL;
echo date('Y-m-d H:i:s', mktime(10,30,0,8,18,2014)) . PHP_EOL;
echo gmdate('Y-m-d H:i:s', mktime(10,30,0,8,18,2014)) . PHP_EOL;
echo date('Y-m-d H:i:s', gmmktime(10,30,0,8,18,2014)) . PHP_EOL;


echo '<h2>Formats</h2>';

echo date('Y-m-D H:i:s', gmmktime(10,30,0,8,18,2014)) . PHP_EOL;
echo date('Y-m-j H:i:s', gmmktime(10,30,0,8,18,2014)) . PHP_EOL;
echo date('l jS m Y \a\t H:i:s', gmmktime(10,30,0,8,18,2014)) . PHP_EOL; // Certains caractères doivent être échappés
echo date('N') . PHP_EOL;
echo date('z') . PHP_EOL; // jour de l’année


echo '</pre>';