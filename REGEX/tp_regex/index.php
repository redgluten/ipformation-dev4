<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

// =================== //
// Regex hexa vers RGB //
// =================== //

// Motif Regex
$reg_rgb = '#rgb\([ ]*255[ ]*,[ ]*255[ ]*,[ ]*255[ ]*\)#mi';

// Contenu à remplacer
$replace_rgb = "#fff";

// Fichier à ouvrir
$css_rgb = file_get_contents('main.css');

// On traite le contenu du fichier avec le motif regex
$result_rgb = preg_replace($reg_rgb, $replace_rgb, $css_rgb);

// On écrit le résultat dans le fichier CSS
$handle_rgb = fopen('rgb.css', 'w+');
fwrite($handle_rgb, $result_rgb);


// =================== //
// Regex RGB vers hexa //
// =================== //

// Motif Regex
$reg_hexa = '/(#f{6})|(#f{3})|(white)/mi';

// Contenu à remplacer
$replace_hexa = "rgb(255, 255, 255)";

// Fichier à ouvrir
$css_hexa = file_get_contents('rgb.css');

// On traite le contenu du fichier avec le motif regex
$result_hexa = preg_replace($reg_hexa, $replace_hexa, $css_hexa);

// On écrit le résultat dans le fichier CSS
$handle_hexa = fopen('hexa.css', 'w+');
fwrite($handle_hexa, $result_hexa);

