# Regex

## Catégories

- POSIX (Portable Operating System Interface)
- PCRE (Perl Compatible Regular Expression)

## Définition

Permet de trouver une chaîne de caractères à partir d’un motif (*pattern*).

## Qu’est-ce que je peux faire avec ?

- Vérifier la validité
- Extraire des parties
- Rendre des emails et URI cliquables
- Gérer des éléments spécifiques
- Récupérer des éléments dans une page web

## Symboles

### Méta-caractères

- caractères littéraux (`a`, `g`, `chat`)
- accent circonflexe `^` : indique le début de la chaîne
- dollar `$` : indique la fin de la chaîne
- point `.` : n'importe quel caractère

### Quantificateurs

- étoile `*` : indique 0.1 ou plusieurs occurences du caractère de la classe précédente
- plus `+` : indique une ou plusieurs occurences du caractère ou de la classe précédente
- point d'interrogation `?` : indique 0 ou une occurence du caractère ou de la classe précédente

### Intervalles de reconnaissance

Définies par les accolades `{}`
- exemple `a{3}` correspond exactement à trois `a`
- exemple `a{2,}` correspond à un minimum de deux `a` consécutifs
- exempe `a{2,4}` correspond uniquement à `aa`, `aaa`, ou `aaaa`

### Classes de caractères

- `[...-...]` : le tiret représente l’intervalle à l’intérieur de la classe
- `br[iu]n` : récupère `brin` ou `brun`

### Classes pré-définies

- `[[:alpha:]]` : n’importe quelle lettre
- `[[:digit:]]` : n’importe quel chiffre
- `[[:xdigit:]]` : caractères héxadécimaux
- `[[:alnum:]]` : n'importe quelle lettre ou chiffre
- `[[:lower:]]` : n'importe quelle lettre en minuscule
- `[[:upper:]]` : n'importe quelle lettre en majuscule
- `[[:graph:]]` : caractères affichages et imprimables
- `[[:graph:]]` : caractères affichages et imprimbales
- `[[:cntrl:]]` : caractères d'échappement
- `[[:print:]]` : caractères imprimables exceptés ceux de contrôle
- `[[:blank:]]` : espace ou tabulation
- `[[:space:]]` : espaces blanc, séparateurs de ligne, de paragraphe...

### Caractères de contrôle

- `\t` : tabulation horizontale
- `\v` : tabulation verticale
- `\f` : saut de page
- `\n` : saut de ligne
- `\r` : retour de chariot

### Classes abrégées (PCRE)

- `\w` : mots
- `\W` : ne correspond pas à mot
- `\d` : chiffre(s)
- `\D` : ne correspond pas à un ou des chiffres
- `\s` : espace
- `\S` : ne correspond pas à un espace

### L’intervalle

Exemples :
- `\&lt;h[1-6]\&gt;` intervalle de recherche de 1 à 6 - affichera les balises de titre `<h1>`
- `[0-9]` : tous les chiffres de 0 à 9

### L’alternative

Exemples :
- `p(ai|i)n` : la barre verticale détermine une alternative pain ou pin
- `^(De|A):@` : détermine une alternative dans le motif tout ce qui commence par De:@ ou A:@

### La classe complémentée

Exemples :
- `[^1]` : tout sauf le chiffre 1
- `[^1-6]` : tout sauf les chiffres 1 à 6

## Les fonctions PCRE en PHP

- `preg_match()` : expression rationnelle standard
- `preg_match_all()` : expression rationnelle globale
- `preg_replace()` : recherche et remplacer par expression rationnelle standard
- `preg_split()` : éclate une chaîne de caractères par expression rationnelle
- `preg_last_error()` : retourne le code erreur de la dernière expression PCRE exécutée

## Les parenthèses capturantes



**Exemples pratiques** :
- `href="(.*?)"` : retourne l’URL

## Liens

- [Regular Expressions (PCRE) en PHP](http://fr2.php.net/manual/en/book.pcre.php)
- [Regex 101](http://regex101.com/)
- [Page wikipedia](http://fr.wikipedia.org/wiki/Expression_rationnelle)