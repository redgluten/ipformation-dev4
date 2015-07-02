Sécurité sur le web
===================

95 % des grosses attaques de sites proviennent d’injections SQL.

## Resources

- [OWASP](https://www.owasp.org/) (Open Web Application Security Project) : consortium pour la sécurité des applications Web ==> préconisations et outils
- [Sécurité PHP 5 et MySQL](http://www.eyrolles.com/Informatique/Livre/securite-php-5-et-mysql-9782212121148)
- [Sécurisation des failles CRSF](http://openclassrooms.com/courses/securisation-des-failles-csrf)
- [Stocker les sessions dans votre base de données](http://openclassrooms.com/courses/stocker-les-sessions-dans-votre-base-de-donnees)
- [OWASP / Local-Remote File Inclusion (LFI / RFI)](http://blog.clever-age.com/fr/2014/10/21/owasp-local-remote-file-inclusion-lfi-rfi/)

## Outils

- [Kali](https://www.kali.org) Distribution spécialisée dans les outils pour tester la sécurité
- [Damn Vulnerable Web Application](http://www.dvwa.co.uk) (DVWA) 

## Librairies PHP
- [PHP IDS](https://github.com/PHPIDS/PHPIDS)

* * *

## Securité matérielle

## Sécurité réseau 
- admin réseau (IDS / IPS)

## Sécurité application

- exploitation des logs : gestion des journaux
- true crypt : gestionnaire de cryptage (http://truecrypt.fr/)

## Sécurité locaux et systèmes

- peut faire parti du système d'information
- arnaques, ...
- attention de ce fait aux failles de simplicité des applications

## Sécuriser serveur

### Obfuscation
- Masquer noms logiciels et numéros de version
    - Système
    - Logiciel serveur
    - Langage / moteur : PHP, HHVM, etc

## Failles
- variables
- variables dans url
- formulaires
- fichiers upload

## Sécurité applicatif
    - sécurité de 1er niveau (apache, mysql, ssl, ...)
    - sécurité du code (injections, ...)

La sécurité doit être pensée en amont ==> ne peut pas se résoudre à l'écriture de patch.
La sécurité en profondeur est un concept à garder à l'esprit en permanence

Sécurité ==> contrainte ==> problème vis-à-vis de l'utilisateur
Sécurité = ratio entre coût et valeur des données à protéger

Sécurité = matériel / humain / formation / ...

DVWA
- on décompresse DVWA dans src/public
- on va dans config/config.inc ==> on passe mdp à 0000 et niveau security à low dans un 1er temps
- Activer la BDD et retour Home pour connexion avec "admin/password"
- Passer le niveau de sécurité en low si nécessaire (menu DVWA Security)

* * *

A1 - INJECTION : HTML, JAVASCRIPT ou SQL
Mise en place de fichiers ou de morceaux de codes au sein de l'application de manière durable
==> récupération de la base de données, de sa structure.
Mot de passe :
 - clair
 - MD5 (4 secondes à 24 h si pas équipé)
 - SHA1 (4 secondes à 24 h si pas équipé)

 ==> 90% des cas des appli web

Une injection SQL est un type d'exploitation d'une faille de sécurité d'une application interagissant avec une base de données, en injectant une requête SQL non prévue par le système et pouvant compromettre sa sécurité.

80% des grosses attaques de site proviennent de failles SQL

A2 - Violation de Gestion d’authentification et de Session
C'est tout ce qui concerne le vol de mot de passe et de session (session mal fermée, ...)

Solution : double identification et session courte

A3 - Cross-Site Scripting (XSS)
Envoi de HTML et javascript qui permettent de modifier l'utilisation primaire d'un site ==> fake
Remplace une variable par du HTML et du javascript
=> mode reflected ==> url trafiquée avec un morceau de code
=> mode stored ==> variable stockée en base et recrachée à chaque connexion

A4 – Références directes non sécurisées à un objet
Le principe, pour l’attaquant, est d’avoir accès à des informations dont il n’est pas censé avoir connaissance, en modifiant les paramètres des requêtes passées au site au sein de son navigateur.
Problème de sécurisation .htaccess

A8 – Falsification de requête intersites (CSRF)
Combinaison d'attaques 
Ne pas surfer sur le même navigateur que celui de connexion à l'admin

A9 – Utilisation de composants avec des vulnérabilités connues
Plugins, cms

* * *

INJECTION

- requêtes avec des variables : SQL / BASH / EMAIL (avec formulaire de contact)

SSL

- cryptage des échanges entre utilisateur et serveur
- possibilité de la technique de "l'homme du milieu"
    ==> décryptage et encryptage par l'homme du milieu
    ==> certificat SSL de haut niveau / passage par un VPN

FIREWALL

- Va bloquer le classique c'est à dire 80% des attaques
- Firewall logiciels ==> sans intérêt

La sécurité c'est ralentir au maximum l'attaque et limiter la casse



* * *

AUDIT

Mise à plat des applis

- Audit de specs
- Audit de code ==> outils d'analyse et de parsing de code qui détectent des portions de code jugées sensibles
- Test d'intrusion
    - en boite noire ==> croiser avec plusieurs auditeurs (peu exhaustifs)
    - en boite blanche ==> avec connaissances de l'infra-structure et de l'architecture
- Revu de l'infra-structure de développement


* * *

DENI DE SERVICES : 
rechercher à faire tomber un serveur en le surchargeant de demandes

Une attaque par déni de service (denial of service attack, d'où l'abréviation DoS) est une attaque informatique ayant pour but de rendre indisponible un service, d'empêcher les utilisateurs légitimes d'un service de l'utiliser. Il peut s'agir de :

    l’inondation d’un réseau afin d'empêcher son fonctionnement ;
    la perturbation des connexions entre deux machines, empêchant l'accès à un service particulier ;
    l'obstruction d'accès à un service à une personne en particulier ;
    également le fait d'envoyer des milliards d'octets à une box internet.

L'attaque par déni de service peut ainsi bloquer un serveur de fichiers, rendre impossible l'accès à un serveur web ou empêcher la distribution de courriel dans une entreprise.


* * *

SCANNER DE VULNERABILITE

Nessus
Nikto


* * *

LES GRANDES FAMILLES DE FAILLES

INJECTION
 - Formulaire : variables en GET et POST

XSS
 - idem

SESSION (vol de session et prédiction de session)
 - utilisation de cookie

CSRF
 - forcer un utilisateur à faire des actions

FAILLE D'UPLOAD


1 - Brute force
Comment s'en prémunir
    - systeme : sonde de type fail2ban ==> pb des faux positifs.
    - gagner du temps en temporisant la réponse du serveur (genre sleep 3).
    - recaptacha (i'm not a robot)
    - double authentification
    - utilisation d'un timestamp dans un formulaire => comparatif avec différence de xx secondes avec la réponse

2 - Brute force en mode déconnecté ==> test de hash pour retrouver des mots de passe
Comment s'en prémunir
    - ajout d'un grain de sel lors du hashage
    - sensibilisation des utilistaeurs

3 - XSS (reflected et stored)
Comment s'en prémunir
    - `html_entities` ==> pas suffisant
    - `html_special_chars` ==> pas suffisant
    - `strip_tags`

==> faire confiance au nouveau navigateur, utiliser des librairies dédiées à cela 
    PHPIDS ==> https://github.com/PHPIDS/PHPIDS et http://www.olivierlange.com/2009/02/17/php-ids-ou-comment-proteger-son-site-web
    ENYGMA/EXPOSE ==> https://github.com/enygma/expose

4 - EXECUTION DE COMMANDE
Avec le shell, ajout de caractères ; && ou || dans le formulaire
Comment s'en prémunir :
    - éviter le plus possible.
    - Si nécessaire, essayer d'avoir des lignes en dur.
    - utiliser les fonctions PHP : escapeshellarg et escape_hellcmd.

5- CSRF
L’objet de cette attaque est de transmettre à un utilisateur authentifié une requête HTTP falsifiée qui pointe sur une action interne au site, afin qu'il l'exécute sans en avoir conscience et en utilisant ses propres droits. L’utilisateur devient donc complice d’une attaque sans même s'en rendre compte. L'attaque étant actionnée par l'utilisateur, un grand nombre de systèmes d'authentification sont contournés.
Comment se prémunir :
    - passer les données en POST ==> oblige à faire une attaque avec des requêtes AJAX.
    - jeton (TOKEN)
    - solutions spécifiques à chaque cas ==> ex: demander ancien mot de passe lors de changement.
    - différencier les navigateurs utilisés en fonction de son utilisation (navigation != administration)

Ressources :
- [Sécurisation des failles CRSF](http://openclassrooms.com/courses/securisation-des-failles-csrf)
- [Stocker les sessions dans votre base de données](http://openclassrooms.com/courses/stocker-les-sessions-dans-votre-base-de-donnees)

Double autentification sur les données sensibles.

6 - INJECTION DE FICHIERS
Ressources :
- [OWASP / Local-Remote File Inclusion (LFI / RFI)](http://blog.clever-age.com/fr/2014/10/21/owasp-local-remote-file-inclusion-lfi-rfi/)

Remote File Inclusion (RFI) est un type de vulnérabilité trouvé le plus souvent sur ​​des sites web. Il permet à un attaquant d'inclure un fichier distant, généralement par le biais d'un script sur ​​le serveur web. La vulnérabilité est due à l'utilisation de l'entrée fournie par l'utilisateur sans validation adéquate. Elle peut conduire à :

    L'exécution de code sur le serveur web
    L'exécution de code sur le côté client comme le JavaScript qui peut conduire à d'autres attaques comme Cross-site scripting (XSS)
    Déni de service (DoS)
    Le vol de données / Manipulation

Le langage PHP a une directive allow_url_fopen, et si activée, elle permet aux fonctions de fichiers d'utiliser une URL qui leur permet de récupérer des données à partir d'emplacements distants.
Dans php.ini, de nos jours on a allow_url_fopen = on et allow_url_include = off
Permet d'ouvrir des url distante mais ne permet pas de les inclure

Si il y a nécessité d'un allow_url_include = on, il faut travailler en liste blanche sur la valeur que l'on doit inclure.
exemple pour les pages http://www.project.dev/DVWA-1.0.8/vulnerabilities/fi/?page=include.php

7 - LE FICHIER PHP.ini (`sudo nano /etc/php5/apache2/php.ini`)

    A- expose_php = on ==> dans les en-têtes de page
        ==> X-Powered-By : PHP/5.4.4-14+deb7u10
    Donc préférble de paramétrer le expose_php = off (création d'un fichier de surcharge dans /etc/php5/conf.d/security-hardened.ini)

    B - Dans /etc/apache2/conf.d/ créer un fichier security : 
    ServerTokens Prod (à la place de OS)
    ServersSignature off
    ==> on a plus d'informations sur la version d'Apache

    C - Masquer le PHP_SESSID
    cd /etc/php5/conf.d
    sudo nano security-hardened.ini

    ; Session cookie
    session.name = gaw_

    redémarrage apache 2 (sudo service apache2 restart)

    S'assurer que les erreurs ne sont pas afficher en prod


8 - FAILLES AVEC LES SESSIONS
    - vol d'identité avec XSS
    - prédiction ==> le hash est pseudo-aléatoire
    - fixation de session ==> Id de session dans url ==> possibilité de créer une session avec l'url

Désactivation de php transsid
Eviter que php envoi l(id de session en javascript

    ; Session cookie
    session.use_cokokies = On
    session.use.only_cookies = On
    session.use_trans_sid = Off
    ; pas de cookie par le javascript
    session.cookie_httponly = On
    ; permet de supprimer le cookie a la fermeture du navigateur
    session.cookie_lifetime = 0
    ; cookie seulement en https
    ; session.cookie_secure = On
    session.name = gaw_

    ; Qualité de génération
    ; On passe de md5 à sh1
    session.hash_function = 1
    ; Utilise plus de caractères pour la génération
    session.hash_bits_per_character = 6
    session.entropy_file = /dev/urandom
    session.entropy_length = 16

    ; le garbage collector passe 1 fois toutes les 500 requetes
    session.gc_divisor = 500
    ; temps d'une session est de 10 minutes
    session.gc_maxlifetime = 600


9 - INJECTION SQL

Modifier les variables pour modifier la requête
par ex : 0' OR 1=1 -- ==> url : http://www.project.dev/DVWA-1.0.8/vulnerabilities/sqli/?id=0%27+OR+1%3D1+--+&Submit=Submit#

