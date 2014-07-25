# Regex (╯°□°）╯︵ ┻━┻

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

## Liens

- [Regular Expressions (PCRE) en PHP](http://fr2.php.net/manual/en/book.pcre.php)
- [Regex 101](http://regex101.com/)
- [Page wikipedia](http://fr.wikipedia.org/wiki/Expression_rationnelle)
- [Tuto OpenClassroom](http://fr.openclassrooms.com/informatique/cours/concevez-votre-site-web-avec-php-et-mysql/les-expressions-regulieres-partie-1-2)


## Symboles

### Méta-caractères

- caractères littéraux (`a`, `g`, `chat`)
- accent circonflexe `^` : indique le début de la chaîne
- dollar `$` : indique la fin de la chaîne
- point `.` : n’importe quel caractère

### Quantificateurs

- étoile `*` : indique 0.1 ou plusieurs occurences du caractère de la classe précédente
- plus `+` : indique une ou plusieurs occurences du caractère ou de la classe précédente
- point d’interrogation `?` : indique 0 ou une occurence du caractère ou de la classe précédente

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
- `[[:alnum:]]` : n’importe quelle lettre ou chiffre
- `[[:lower:]]` : n’importe quelle lettre en minuscule
- `[[:upper:]]` : n’importe quelle lettre en majuscule
- `[[:graph:]]` : caractères affichages et imprimables
- `[[:graph:]]` : caractères affichages et imprimbales
- `[[:cntrl:]]` : caractères d’échappement
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

## Les références arrières (back reference)

On peut capturer quelque-chose dans un texte et l’utiliser plus loin dans le motif comme référence.

Exemple :
Objectif : Capturer tout ce qui est contenu dans les balises <b> ou <i>.
<i>Texte italique</i> texte normal <b> et texte gras</b> fin du texte.

Motif : `#<([ib])>(.*?)</\1>#`

La première parenthèse capturante mémorisera le i ou le b des balises ouvrantes `<b>` ou `<i>` et l’utilisera plus loin dans les balises fermantes `</b>` ou `</i>` grâce au motif `</\1>` où `\1`, la référence arrière, sera égale à b ou i selon ce qui aura été capturé plus avant.

Résultats :
    Matches [0]=>
    [0]=> <i>Texte italique</i>
    [1]=> <b> et texte gras</b>
    Capture [1]=>
    [0]=> i
    [1]=> b
    Capture [2]=>
    [0]=> Texte italique
    [1]=> et texte gras

Chaque parenthèse capturante rencontrée stockera la capture dans une référence arrière numérotée en fonction de la position de la parenthèse dans le motif.

Exemple : 
"Le premier jour de la semaine est le lundi suivi par mardi, le mercredi puis le jeudi qui précède le vendredi."

Il peut s’avérer intéressant de ne pas incrémenter les références arrières pour en faciliter le traitement.

`/((lun|mar|jeu)|(mer)cre|(ven)dre)di/` ce motif aura 4 groupes de captures puisqu’il y a 4 groupes de parenthèses avec un niveau d’imbrication.

La version Perl 5.10 a introduit la possiblilité de ne pas incrémenter la numérotation des captures dans une série d’alternatives (*Duplicate Subpattern Numbers*).

Le motif ci-dessus s’écrira: `#(?|(lun|mar|jeu)|(mer)cre|(ven)dre)di#`. Remarquez le `?|` de la première parenthèse. Ce motif produira un seul groupe de capture.

Résultat : 
Capture [1]=>
    [0]=>lun
    [1]=>mar
    [2]=>mer
    [3]=>jeu
    [4]=>ven

**Exemples pratiques** :
- `href="(.*?)"` : capture l’URL


## Parenthèses non capturantes

Les parenthèses sont principalement utilisées pour capturer une série de caractères correspondant à un motif. Dans certains cas, elles seront utilisées pour délimiter les alternatives ou bien une chaîne alternative.

Admettons qu’on cherche à capturer tous les mots précédés de `des` ou `de`, on pourrait faire `#(le|les|la|de|des|du)\s(\w+)#` sur l’exemple précedent.

Ceci retournera un tableau contenant les mots et les déterminants (de, des ets...) on peut rendre les premières parenthèses non capturantes en rajoutant simplement ?: après la parenthèse ouvrante : `#(?:le|les|la|de|des|du)\s(\w+)#`

Le tableau de résultat retournera cette fois ceci :

    Matches [0]=>
        [0]=> de la
        [1]=> le lundi
        [2]=> le mercredi
        [3]=> le jeudi
        [4]=> de le

    Capture [1]=>
        [0]=> la
        [1]=> lundi
        [2]=> mercredi
        [3]=> jeudi
        [4]=> le


## Les assertions PCRE

### Les assertions simples 

- `\b` limite de mot
- `\B` pas de limite de mot
- `\A` début de la chaine
- `\Z` fin de la chaine ou nouvelle ligne à la fin de la chaine
- `\z` fin de la chaine

Texte exemple : 
"Voici simplement un simple exemple, très simple, mais pas simplet sur les assertions PCRE pourtant pas si simples!"

Objectif : Extraire tous les mots simple ou simples.

- Etape 1 : `# simples? #` => Retourne les mots "simple" entourés par des espaces
- Etape 2 : `# simples?[ ,!.;:]#` => Retourne les mots "simples" finissant par une ponctuation

Pour faire ceci, il y a l’assertion `/b` qui est équivalente à `(^\w|\w$|\W\w|\w\W)`

Résultat : `#\bsimples?\b#`

Pensez aux assertions simples comme des indicateurs de position dans la chaîne cible. Cet indice de position ne pointera pas sur un caractère mais bien entre deux caractères.


## Les options
    
    i - Insensible à la casse
    s - Le dot comprend le retour ligne
    m - Multiligne
    e - Evaluation de code PHP
    U - Option non gourmande
    x - Option intégrant le # commentaire

### i - Insensible à la casse

`preg_replace('#les?#i', '***', $txt)`

Interrupteur avec l’option insensible à la casse 
    Désactivation : (?-i) 
    Activation : (?i)

`preg_match_all('#concor(?-i)dance#i', $txt, $out)`

Texte exemple :
Cette regex doit matcher concordance et CONCORdance, mais pas concorDANCE ou CONCORDAncE

### s - Le dot comprend le retour ligne

L’option s ajoute le retour à la ligne au métacaractère.
Attention : Le résultat contiendra le retour à la ligne.

Texte exemple :
Petit exemple pour capturer l’URL de ceci : `<a href="http://
url.com">lien</a>`

Pattern : `#<a href="(.*?)">#s`

### m - Multiligne

L'option m (PCRE MULTILINE) demande au moteur regex de considérer chaque retour ligne comme la fin de chaîne et le début de la suivante.

### e - Evaluation de code PHP 

(DEPRECATED 5.5.0 utilisez preg_replace_callback)

`echo preg_replace('#(\w+)([^\w]*)(\w+)#e','strtoupper("\1")."\2".strrev("\3")' , $txt);`

Texte example : 
php supporte aussi des expressions rationnelles compatibles Perl,

Après évaluation :
PHP etroppus AUSSI sed EXPRESSIONS sellennoitar COMPATIBLES lreP,

    
    function transform($capture) {
        $txt = strtoupper($capture[1]).$capture[2].strrev($capture[3]);
        return $txt;
    }

    echo preg_replace_callback('#(\w+)([^\w]*)(\w+)#', "transform", $txt);


### U - Option non gourmande

Rendre un ou plusieurs quantificateur non-gourmand dans une regex. L’option U permet de rendre tous les quantificateurs d’une regex non gourmands. Ces deux motifs sont parfaitement identiques :

    '#<a href="(.*?)">(.*?)</a>#'
    '#<a href="(.*)">(.*)</a>#U'


### x - Option intégrant le # commentaire

Avec cette option, les caractères d’espacement sont ignorés, sauf lorsqu’ils sont échappés, ou à l’intérieur d’une classe de caractères, et tous les caractères entre # non échappés et en dehors d’une classe de caractères, et le prochain caractère de nouvelle ligne sont ignorés. C’est l’équivalent Perl de l’option `/x` : elle permet l’ajout de commentaires dans les masques compliqués.

Exemple : 
    $motif = '/^\d+;[^;]+;[^;]+;HADDOCK;([^;]+);([^;]+);.*/m'; 

    $motif = " 
    /         # délimiteur (ici je n’ ai pas pris #, réservé pour les commentaires) 
        ^         # ancrage de début de chaîne 
        \d+;      # tout décimal 1 fois ou plus, suivi par ; 
        [^;]+;    # tout caractère sauf ; 1 fois ou plus, suivi par ; 
        [^;]+;    # idem 
        HADDOCK;  # les caractères HADDOCK suivi par ; 
        ([^;]+);  # capture tout caractère sauf ; 1 fois ou plus, suivi par ; 
        ([^;]+);  # idem 
        .*        # tout caractère sauf retour ligne 0 fois ou plus 
    /xm";

## Les assertions compliquées

Les assertions se placent entre deux caractères et testent les caractères suivants (lookahead) ou précédents (lookbehind).

| Types d’assertion                | Motif      | Succès si le motif dans l’assertion...   |
| -------------------------------- | ---------- | ---------------------------------------- |
|Les assertions arrières positives | `(?<=motif)` | ...trouve une concordance à gauche       |
|Les assertions arrières négatives | `(?<!motif)` | ...ne trouve pas de concordance à gauche |
|Les assertions avant positives    | `(?=motif)`  | ...trouve une concordance à droite       |
|Les assertions avant négatives    | `(?!motif)`  | ...ne trouve pas de concordance à droite |

L’implémentation des assertions arrières déplace temporairement le pointeur de position vers l’arrière, et cherche à vérifier l’assertion. Si le nombre de caractères est différent, la position ne sera pas correcte, et l’assertion échouera. La combinaison d’assertions arrières avec des sous-masques peut être particulièrement pratique à fin des chaînes.

Objectif : On veut extraire du texte suivant le déterminant "de", mais uniquement s’il est suivi du mot "caractère"

Pattern : `#\bde\b(?= caractères)#`

Objectif 2 : Toutes les occurrences de "assertion" ou "assertions" sauf celles précédées de `l’`.

Pattern : `#(?<!l’)assertions?#`


## Les masques conditionnels

Le prototype d’un sous-masque conditionnel (conditional sub-pattern) est le suivant :

    (?(condition) masque_si_vrai | masque_sinon)

Il s’agit en fait d’une structure de contrôle du type if-then-else. Lorsque nous avons deux masques possibles, l’évaluation de la condition déterminera l’utilisation de l’un ou de l’autre.

La condition est soit une assertion soit un décimal se référant à une référence arrière (capture).

Exemple : 

    To: destinataire@example.com (commentaire inutile à ne pas capturer)
    From: moi@example.net (commentaire encore plus inutile)
    Subject: Ces regex c’est mal.


Objectif : Capturer les différents blocs To/From/Subject

Pattern : `/^((From|To)|Subject): ((?(2)\w+@\w+\.[a-z]+|.+))/m`

    '/ 
    ^                        # ancrage début de chaîne (ligne puisque option m) 
    ((From|To)|Subject):\s   # soit From ou To (capturé en \2) soit Subject suivi par : et espace 
    (                        # paranthèse capturante (capture \3) 
      (?(2)                    # if (From ou To) (2 est la référence arrière à la capture plus haut) 
        \w+@\w+\.[a-z]+          # then toute chaine alphanum suivie par @ suivie par aphanum 
                                 # suivie par un point et une chaîne alpha 
       |                       # else 
         .+)                     # tout caractère une ou plusieurs fois 
    )                        # fin capture \3 et options m multiline et x pour commentaires 
    /xm' 


## Optimisation des Regex

- Utilisez le moins possible les dot
- Supprimez les parenthèse capturantes inutiles
- Optimisez les alternatives 
- Scindez vos regex trop complexe
- Supprimez les options inutiles
- Choisir les fonctions callback appropriées
- Ancrez vos motifs
- Testez et chronométrez


## Optimisez vos alternatives

Le motif non ordonné `#(?:le|la|les|de|du|des|au|aux|mes|tes|ses|nos|vos) alternatives#` sera plus lent que si vous placiez le choix le plus probable devant : `#(?:vos|la|les|de|du|des|au|aux|mes|tes|ses|nos) alternatives#`

Il est plus efficace d’écrire `[akpi]` plutôt que `(?:a|k|p|i)`. 
De la même manière il vaut mieux faire `(?:les?|des?|aux?)` que `(?:le|les|de|des|au|aux)`.

Testez et chronométrez :

    <?php
        $timeStart = microtime(true); 
        $nbLoops = 200; 
        while ($nbLoops--) { 
            /* 
             *  code à tester 
             */ 
        } 
        echo number_format(microtime(true) - $timeStart, 4);
    ?>

Point non abordés :
 - [Masque récursif](http://php.belnet.be/manual/fr/regexp.reference.recursive.php)


