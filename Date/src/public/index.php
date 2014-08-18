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
$days     = floor(($tmp - $hours) / 24);


echo '<h2>Objet</h2>';

$d1 = new DateTime();
print_r($d1);

$d2 = new DateTime('2014-08-15 12:27:30.15632');
print_r($d2);

// L’objet possède des méthodes pour les opérations courantes
$diff = $d2->diff($d1, true);
print_r($diff);

$d12 = new
$d12->sub

$d13 = new DateTime();
$d13->modify('+1 day');
echo $d13->format('Y-m-d H:i:s') . PHP_EOL;

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


echo '</pre>';