# Filtrage et validation

## CTYPE
Les fonctions fournies par cette extension vérifient si un caractère ou une chaîne appartient à une certaine classe de caractères, suivant la configuration locale courante (voir aussi la fonction `setlocale()`).

Validation à l’aide de `ctype_alnum` pour savoir si une chaîne de caractères est uniquement composée de caractères alphanumériques :
    
    $str1 = "TestdefonctionCtype";
    $result = ctype_alnum($str1);
    var_dump($result);

Retourne :
boolean false

    $str2 = "Chaîne d’essai pour la ctype #1";
    $result = ctype_alnum($str2);
    var_dump($result);

Retourne :
boolean true

Voir [la liste des fonctions disponibles](http://php.net/manual/fr/ref.ctype.php).

## filter_var

Filtre une variable avec un filtre spécifique :

- `filter_var('test@mail.com', FILTER_VALIDATE_EMAIL)` Retourne : `true`.
- `filter_var('test.mail.com'), FILTER_VALIDATE_EMAIL)` Retourne : `false`;
- `filter_var('http://google.com', FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)` retourne `true`;
- `filter_var('192.168.56.110', FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)` retourne `true`

Autre méthode pour tester IP :

    $result = (bool) ip2long('192.168.56.101');
    var_dump($result);
    $result = filter_var(
        '88.115.20.12',
        FILTER_VALIDATE_IP,
        array("flags" => FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PIV_RANGE )
    );
    var_dump($result);

Exemple de création d’un filtre 

    function testIp($value) {
        $parts = explode('.', $value);
        if ($parts[0] == 88 && $parts[1] == 115) {
            return $value;
        } else {
            return false;
        }
    }
    
    $result = filter_var(
        '88.115.20.12',
        FILTER_CALLBACK,
        array("options" => "testIp")
    );
    var_dump($result);

Connaître la liste des filtres disponibles sur une installation donnée : `filter_list()`.

### Valeurs externes 

`filter_input (INPUT_GET, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS)`

    $options = array(
        'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'password' => array(
            'filter' => FILTER_VALIDATE_INT,
            'options' => array('min_range' => 10, 'max_range' => 20)
        )
    );
    $result = filter_input_array(INPUT_GET, $options);
    var_dump($result);


## Liens utiles

- [An Introduction to Ctype Functions](http://www.sitepoint.com/an-introduction-to-ctype-functions/)
- [Filter Fonctions](http://fr2.php.net/manual/fr/ref.filter.php)
- [Sanitize and Validate Data with PHP Filters](http://code.tutsplus.com/tutorials/sanitize-and-validate-data-with-php-filters--net-2595)