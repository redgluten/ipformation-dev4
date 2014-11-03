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