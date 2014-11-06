# Réseau

## Types d'adresses

- Unicast (monodiffusion) : un hôte vers un hôte
- Broadcast (diffusion) : un hôte vers tous les hôtes
- Multicast (multidiffusion) : un hôte vers certains hôtes

Une adresse est attribuée à un protocole

## Les classes d'adresses IP

- Classe A : 0.0.0.0 à 127.255.255.255 (masque 255.0.0.0 notation CIDR : /8), Unicasts et Broadcast
- Classe B : 128.0.0 à 191.255.255.255 (masque 255.255.0.0 notation CIDR: /16), Unicasts et Broadcast
- Classe C : 192.0.0.0 à 223.255.255.255 (masque 255.255.255.0 /24), Unicast et Broadcast
- Classe D : 224.0.0.0 à 239.255.255.255 (masque 255.255.255.255 /32), Multicast
- Classe E : 240.0.0.0 à 255.255.255.255 Expérimental

## Plages réservées

- Classe A : 10.0.0.0 à 10.255.255.255 (255.0.0.0 /8) Unicast, Broadcast
- Classe B : 172.16.0.0 à 172.31.255.255 (255.240.0.0 /12) Unicast, Broadcast
- Classe C : 192.168.0.0 à 192.168.255.255 (masque 255.255.255.0 /24), Unicast et Broadcast
- Classe D : 239.0.0.0 à 239.255.255.255 (masque 255.255.255.255 /32), Multicast
- Classe E : 240.0.0.0 à 255.255.255.255 Expérimental

## Adresses spéciales

- Classe A : 0.0.0.0, IP routeur (intinéraire par défaut)
- Classe A : 127.0.0.0 à 127.255.255.255 (255.0.0.0 /8) Loopback Adress
- Classe B : 169.254.0.0 à 169.254.255.255 (255.255.0.0 /16) APIPA (Automatic Private Internet Protocol Addressing) Adress


## Masques

Le masque permet de distinguer les parties réseau et identifiant de l'adresse IP.

Par exemple deux adresses 192.168.1.1 et 192.168.2.1 avec un masque 255.255.255.0 ne peuvent communiquer car elles ne sont pas sur le même réseau. Avec un masque 255.255.0.0 cela serait possible.

[Conversion décimale vers binaire](http://fr.wikihow.com/convertir-du-d%C3%A9cimal-en-binaire)

[Conversion binaire vers hexadécimal](http://www.elektronique.fr/cours/code/convertir_binaire-hexadecimal.php)

Exemples :

- 192.168.1.1 (11000000.10101000.00000001.00000001)
- 255.255.255.0 (11111111.11111111.11111111.10000000)


## Problèmes

131.107.0.0 au moins 15 sous-réseaux 16 (2^4)
masque : 11111111.11111111.11110000.0000000 255.255.240.0

140.10.0.0 avec 500 sous-réseaux : 512 (2^9)
masque : 11111111.11111111.11111111.10000000 (255.255.255.128)

192.168.10.0.0 avec 8 sous-réseaux : 8 (2^3)
masque : 11111111.11111111.11111111.11100000 (255.255.255.224)


Déterminer réseau et masque à partir d'une plage :

Plage : 172.16.0.1 -- 172.31.255.254

172.16.0.0     routeur
172.16.0.1     début plage
172.31.255.254 fin de plage
172.31.255.255 broadcast

Pas : 16 (2^4) 11110000 (240) donc masque 255.240.0.0 et notation CIDR  12

Déterminer plage en fonction de l'adresse réseau + CIDR :

Adresse / CIDR : 211.118.30.16 /28

CIDR 28 donc pas de 2^4 : 8. 

211.118.30.16 routeur
211.118.39.17 début plage
211.118.39.30 fin plage
211.118.39.31 broadcast

Adresse / CIDR : 34.79.128.0 /18

CIDR 18 donc pas de 2^6 : 64

34.79.128.0   routeur
34.79.128.1   début plage
34.79.192.254 fin de plage
34.79.192.255 broadcast


Adresse / CIDR :  144.32.0.0 /13

CIDR 13 donc 8+5 (11111000) le pas est de 2^3 : 8

144.32.0.0 routeur
144.39.255.254 début plage
144.39.255.254 fin de plage
144.39.255.255 broadcast



Vous gérez un réseau composé de 175 machines réparties sur un seul segment.
Vous utilisez le bloc d'IP: 192.168.9.0 /24

Vous souhaitez, à l'aide d'un routeur supportant le CIDR et le VLSM, diviser le réseau en 3 segments (A, B et C), mais vous n'avez pas le droit de changer d'ID de réseau.

Les 175 hôtes seront répartis ainsi :A: 100 hôtes, B: 50 hôtes et C: 25 hôtes.
Vous voulez également réserver des adresses pour un futur quatrième réseau.


- On alloue un réseau de 128 (2^7) adresses pour A donc masque de 255.255.255.254 (10000000) /25:
    192.168.9.0   routeur
    192.168.9.1   début plage
    192.168.9.126 fin de plage
    192.168.9.127 broadcast
- On alloue un réseau de 64 (2^6) adresses pour B donc masque de 255.255.255.252 (11000000) /26 :
    192.168.9.128 routeur
    192.168.9.129 début plage
    192.168.9.190 fin de plage
    192.168.9.191 broadcast
- On alloue un réseau de 32 (2^5) adresses pour C donc masque de 255.255.255.248 (11100000) /27 :
    192.168.9.192 routeur
    192.168.9.193 début plage
    192.168.9.222 fin de plage
    192.168.9.223 broadcast
- On alloue le reste du réseau à D soit /27 :
    192.168.9.224 routeur
    192.168.9.225 début de plage
    192.168.255.254 fin de plage
    192.168.255.255


## Cablâge

Croisé / droit : croisé entre deux postes identiques. Droit entre post et routeur (qui inverse émission et réception). Les machines modernes détectent automatiquement la position des contrôlleurs.

![Cables croisés ou droits](cables.png)

## Typologie réseau

Voir [la page Wikipédia](http://fr.wikipedia.org/wiki/Topologie_de_réseau).

## Modèle OSI

![Couches du modèle OSI](couches_osi.gif)

![Couches OSI sur réseau](couches_osi_reseau.png)

## Domaines de collisions

Au sein d’un hub : si tout le monde décide de parler en même temps : 1 domaine de collision.

Deux hubs interconnectés : un seul domaine de collision car les hubs envoient automatiquement à tout le monde.

## CSMA /CD

1. On écoute le bus pour savoir qi quelqu’un parle ou s’il y a une collision
2. On peut parler lorsque le bus es tlibre
3. Si on parlme mais qu’une collision survient on doit se taire
4. On reparle
5. S’il ya une collision on revient à l’étape 4

Les dispositifs de couche 2 segmentent les domaines de collisions.

![Domaines de collision](domaines_collision.png)

## Boucles de commutation et tempêtes de Broadcast

Le protocole ![*Spanning tree*](http://cisco.goffinet.org/s3/spanning_tree#.VFinF4fVuQs) permet d’éviter les problèmes de trames dupliquées et de tempêtes de Broadcast qui peuvent survenir dans une typologie maillée.
Il désactive certains liens de telle sorte qu’Il n’y ait plus de boucle, ces liens sont réactivés uniquement si d’autres tombent. 
Les données ne peuvent pas emprunter plusieurs chemins pour atteindre une destination.

### ST : création d’un chemin unique dans une typologie maillée

**Root port** (RP) port source emprunté pour aller vers le switch racine.

**Designated port** (DP) port de destination emprunté pour aller vers le switch racine.

1. Élection d’un switch racine
	1. ID de switch la plus petite (32768 par défaut chez Cisco)
	2. Adresse MAC de switch la plus petite (Adresse MAC de l’interface virtuelle d’administration chez Cisco)
2. Calcul du chemin le moins coûteux (basé sur la bande passante)
	- 10 Mb/s : coût de 100
	- 100Mb/s : coût de 19
	- 1Gb/s : coût de 4
	- 10 Gbs : coût de 2
3. Si les chemins se valent on passe par le switch
	1. Avec la plus petite ID
	2. Avec la plus petite adresse MAC
4. Si les switchs sont reliés plusieurs fois entre eux on passe par le *Destinated port* :
	1. Avec la plus petite ID de port (128 par défaut chez Cisco)
	2. Avec le plus petit n° de port


## Composition d’un routeur

1. **La RAM** :
	- contient la table de routage
	- contient le cache ARP
	- gère la liste d’attente des paquets
	- sert de mémoire temporaire pour la configuration
	- perd son contenu au redémarrage (pour sauvegarder la conf : `copy run start`)
2. **La NVRAM** : 
	- contient le fichier de configuration
	- conserve son contenu au redémarrage
3. **La mémoire Flash** :
	- contient le système d’exploitation
	- conserve son contenu au redémarrage
4. **Les interfaces** :
	- permettent de faire transiter les paquets entre les réseaux

## Processus de démarrage d’un routeur Cisco

1. Vérifie que ses composants fonctionnent
2. Cherche dans le registre de configuration le chemin du sytème d’exploitation. Par défaut dans la mémoire flash ou dans le serveur TFTP.  S’il ne trouve pas d’OS il charge ROMMON (OS minimaliste situé sur une ROM)
3. Cherche dans le registre de configuration le chemin du fichier de configuration. Par défaut dans la NVRAM ou dans le serveur TFTP. S’il en trouve pas de fichier de configuration il considère qu’il n’a jamais été configuré et proporse un assistant de configuration.



Interro :
- Cables droits / croisés
- Matériels OSI : hubs, sitch
- Couches OSI
- Topologies réseaux
- Composants routeur
- Calcul masque
- commandes cisco
- Résumé de routes
- domaines de broadcast / collision
- RIP