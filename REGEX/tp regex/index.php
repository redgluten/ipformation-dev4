<?php 

error_reporting(E_ALL);
ini_set("display_errors", 1);

// =================== //
// Regex hexa vers RGB //
// =================== //

$reg_rgb = '#rgb\([ ]*255[ ]*,[ ]*255[ ]*,[ ]*255[ ]*\)#mi';
$replace_rgb = "#fff";
$css_rgb = file_get_contents('main.css');

$result_rgb = preg_replace($reg_rgb, $replace_rgb, $css_rgb);

$handle_rgb = fopen('rgb.css', 'w+');
fwrite($handle_rgb, $result_rgb);


// =================== //
// Regex RGB vers hexa //
// =================== //

$reg_hexa = '/(#f{6})|(#f{3})|(white)/mi';
$replace_hexa = "rgb(255, 255, 255)";
$css_hexa = file_get_contents('rgb.css');

$result_hexa = preg_replace($reg_hexa, $replace_hexa, $css_hexa);

$handle_hexa = fopen('hexa.css', 'w+');
fwrite($handle_hexa, $result_hexa);
