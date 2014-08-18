<?php

echo '<h1>Dates en PHP </h1>';

// La définition d’un tz est obligatoire (à faire de préférence dans le php.ini)
ini_set('date.timezone', 'Europe/Paris');

echo '<pre>';

// Afficher timestamp avec PHP
echo time() . PHP_EOL;

// Afficher date avec PHP
echo date('Y-m-d') . PHP_EOL;


echo '</pre>';