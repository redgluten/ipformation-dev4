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
