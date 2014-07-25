# printf et sprintf

`int printf(string, $format, [$arg, [, $arg]])`, valeur de retour : taille chaîne affichée
`mixed sprintf(string $format, [$arg, [,$arg]])`, valeur de retour : chaîne formatée
`sprintf vsprintf(string $format, array $args)`, valeur de retour : chaîne formatée

string => %s
integer => %d, %u, %c, %o, %x, %X, %b
double => %g, %g, %e, %E, %f, %f

`$format = "Bonjour, %s";` 's' signifie 'string'
`$string = sprintf($format, "Batman")`

## Spécificateurs de type
- `s` : l’argument est traité et présenté comme une chaîne de caractères.
- `d` : l’argument est traité commen un entier et présenté comme un nombre entier (en base 10), signé
- `u` : l’argument est traité comme un entier et présenté comme un nombre entier (en base 10), non signé

