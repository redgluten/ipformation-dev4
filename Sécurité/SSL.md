SERVEUR HTTPS
=============

## Installer HTTPS sur Apache

1. Il faut activer le https sur apache car non actif par défaut
2. Ouvrir les ports nécessaires sur firewall
3. Paramétrages

## Fournisseurs de certificats SSL

On monte sur sa machine une autorité de certification locale que l'on rajoute à la liste reconnue par l’ordinateur

De base c'est pour un domaine
Avec un certificat whitecard, c'est pour tous les sous-domaines

1. Création d'une autorité de certification 
2. Faire reconnaître cette autorité en locale
3. Paramétrer apache pour le certificat



### CREATION D’UNE AUTORITÉ DE CERTIFICATION

#### Création des dossiers et fichiers nécessaires

    cd /home/vagrant/
    mkdir tmp
    cd tmp
    mkdir CA
    cd CA
    mkdir certs private
    echo '01' > serial
    touch index.txt

On copie le fichier de conf de ssl
`sudo cp /etc/ssl/openssl.cnf /etc/ssl/openssl.cnf.default`

On édite le fichier de conf
`sudo nano /etc/ssl/openssl.cnf`
- passer `default_bits` à `2048` si nécessaire
- décommenter la ligne `req_extensions`
- modifier `0.organizationName = IP FORMATION`
- modifier `0.organizationName_default = IP FORMATION`
- modifier `countryName_default = FR`
- modifier `stateOrProvinceName_default = FRANCE`
- créer `localityName_default si nécessaire (LYON)`


On génère une clé rsa pour l'autorité de certification qui sert à générer le certificat
`openssl genrsa -des3 -out project-ca.key 2048`

On crée le certificat de l'autorité de certification (requete de création) dans `~/tmp` à partir de la clé générée à l'étape précédente
`openssl req -new -x509 -key project-ca.key -out project-ca.crt -days 3650`
    
Donner la catch phrase de la clé précédente
    Country Name (2 letter code) [FR]:
    State or Province Name (full name) [FRANCE]:
    Locality Name (eg, city) [LYON]:
    IP FORMATION [IP FORMATION]:
    Organizational Unit Name (eg, section) []:DevTeam
    Common Name (e.g. server FQDN or YOUR name) []:www.project.dev (important de bien mettre le bon nom de projet utilisé)
    Email Address []:test@test.fr

On vérifie le certificat et on vérifie ce qui a été généré
`openssl x509 -in project-ca.crt -text -noout`

Maintenant on va générer des certificats et des clés pour le serveur grâce à l'autorité et à sa clé
`openssl genrsa -des3 -out project-server.key 1024` ==> génération de la clé de serveur

On fait une requête de certificat (on ne le crée pas : pas de -x509)
`openssl req -new -key project-server.key -out project-server.csr`

Donner la catch phrase de la clé précédente

    Country Name (2 letter code) [FR]:
    State or Province Name (full name) [FRANCE]:
    Locality Name (eg, city) [LYON]:
    IP FORMATION [IP FORMATION]:
    Organizational Unit Name (eg, section) []:DevTeam
    Common Name (e.g. server FQDN or YOUR name) []:www.project.dev
    Email Address []:test@test.fr

    Please enter the following 'extra' attributes
    to be sent with your certificate request
    A challenge password []:0000
    An optional company name []:

`cat project-server.csr` ==> on vérifie l'existence du certificat

On génère le certificat à partir de la requête précédente
`openssl x509 -req -in project-server.csr -out project-server.crt -sha1 -CA project-ca.crt -CAkey project-ca.key -CAcreateserial -days 3650`
`pass phrase : 0000`

On vérifie le certificat et on vérifie ce qui a été généré
`openssl x509 -in project-server.crt -text -noout`

le .crt et le .key du serveur vont nous servir dans la config d'Apache

On va dans 
`cd /etc/apache2/sites-available/`
`sudo nano default-ssl`

`SSLCertificateFile    /home/vagrant/tmp/CA/project-server.crt`
`SSLCertificateKeyFile /home/vagrant/tmp/CA/project-server.key`

Puis
`sudo a2enmod ssl`
`sudo a2ensite default-ssl`

`sudo service apache 2 restart`
`pass phrase : 1234`

