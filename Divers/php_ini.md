# Notes PHP.ini


## Memory limit
En général 32M devraient suffire.

## open_basedir
Sert à définir le path où PHP peut lire des fichiers (/var/www/ par exemple).

## output_buffering
Catpure toutes sorties écrans et met dans tampon. En général à 4096o.

## entropy_length
Longueur d'aléatoire dans le hash de session : compromis sécurité / performance.
