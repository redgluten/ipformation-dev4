# printf et sprintf

## Les fonctions

`int printf(string, $format, [$arg, [, $arg]])`, valeur de retour : taille chaîne affichée
`mixed sprintf(string $format, [$arg, [,$arg]])`, valeur de retour : chaîne formatée
`sprintf vsprintf(string $format, array $args)`, valeur de retour : chaîne formatée

## Types

- string => %s
- integer => %d, %u, %c, %o, %x, %X, %b
- double => %g, %g, %e, %E, %f, %f

`$format = "Bonjour, %s";` 's' signifie 'string'  
`$string = sprintf($format, "Batman")`  
`echo $string affichera "Bonjour, Batman"`  

## Le masque suit plusieurs règles

1- Le masque est déterminé par le signe de pourcentage (%).

2- S'il n'y a pas de spécificateur de position (1$) le masque prend les arguments dans l'ordre énoncé.  

3- Un remplisseur optionnel indique quel caractère sera utilisé pour compléter le résultat jusqu'à la longueur requise. Par défaut, le remplissage se fait avec des espaces. Ce peut être le caractère d'espace, ou le caractère 0. Un autre caractère de remplissage peut être spécifié en le préfixant avec un guillemet simple (').  

Exemples : 
- %010s		Remplissage avec le caractère "0" jusqu'a la longueur 10  
- %10s 		Remplissage avec le caractère " " jusqu'a la longueur 10 (espace)  
- %'#10s  	Remplissage avec le caractère "#" jusqu'a la longueur 10  

4- Un spécificateur d'alignement qui indique si le résultat doit être aligné à gauche ou à droite. Par défaut, le résultat est aligné à droite. Le caractère - fera que le résultat sera justifié à gauche. 

Exemples : 
- %-10s		Remplissage avec le caractère " " jusqu'a la longueur 10 justifier à gauche  
- %10s		Remplissage avec le caractère " " jusqu'a la longueur 10 justifier à droite  
- %-010s	Remplissage avec le caractère "0" jusqu'a la longueur 10 justifier à gauche  

5- 
## Spécificateurs de type

- `s` : l’argument est traité et présenté comme une chaîne de caractères.
- `d` : l’argument est traité commen un entier et présenté comme un nombre entier (en base 10), signé
- `u` : l’argument est traité comme un entier et présenté comme un nombre entier (en base 10), non signé
- `c` : l’argument est traité comme un entier et présenté comme le caractère de [code ASCII correspondant](http://table-ascii.com)
- `o` : l’argument est traité comme un entier et présenté comme un nombre octal
- `x` : l’argument est traité comme un entier et présenté comme un nombre héxadécimal (lettres en minuscules)
- `X` : l’argument est traité comme un entier et présenté comme un nombre héxadécimal (lettres en majuscules)
- `b` : l’argument est traité comme un entier et présenté comme un nombre binaire
- `e` : l’argument est traité comme une notation scientifique (e.g. 1.2e+2)
- `E` : identique à `e` mais en majuscules (1.2E+2)
- `g` : raccourci pour %e et %f
- `G` : raccourci pour %E et %F
- `f` : l’argument est traité comme un nombre à virgule flottante tenant compte de la locale utilisée
