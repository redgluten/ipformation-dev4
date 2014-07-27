<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Regex</title>
</head>
<body>

<?php

// =================== //
// Regex RGB vers hexa //
// =================== //

// Motif Regex
$reg_hexa = '#background:[ ]*rgba\(([ ]*[1-2]?[0-5]?[0-5]?[ ]*,){2}[1-2]?[0-5]?[0-5]?[ ]*,[ ]*(0.[0-9]{1,2})|([ ]*1[ ]*\)#mi';

// À remplacer par
$replace_hexa = "#fff";

// Fichier à ouvrir
$css_hexa = file_get_contents('main.css');
if (!$css_hexa) {
    echo "main.css inexistant <br/>";
} else {
    echo "Ouverture de main.css <br/>";
}

// On traite le contenu du fichier avec le motif regex
$result_hexa = preg_replace($reg_hexa, $replace_hexa, $css_hexa);

// On écrit le résultat dans le fichier CSS
$handle_hexa = fopen('hexa.css', 'w+');
if (!$handle_hexa) {
    echo "Impossible de créer hexa.css <br/>";
} else {
    fwrite($handle_hexa, $result_hexa);
    echo "Écriture de hexa.css <br/>";
}



// =================== //
// Regex hexa vers RGB //
// =================== //

// Motif Regex
$reg_rgb = '/(#f{6})|(#f{3})|(white)/mi';

// À remplacer par
$replace_rgb = "rgb(255, 255, 255)";

// Fichier à ouvrir
$css_rgb = file_get_contents('hexa.css');
if (!$css_rgb) {
    echo "hexa.css inexistant <br/>";
} else {
    echo "Ouverture de hexa.css <br/>";
}

// On traite le contenu du fichier avec le motif regex
$result_rgb = preg_replace($reg_rgb, $replace_rgb, $css_rgb);

// On écrit le résultat dans le fichier CSS
$handle_rgb = fopen('rgb.css', 'w+');
if (!$handle_rgb) {
    echo "Impossible de créer rgb.css <br/>";
} else {
    fwrite($handle_rgb, $result_rgb);
    echo "Écriture de rgb.css <br/>";
}

?>

</body>
</html>
