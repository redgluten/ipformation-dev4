# Énoncé

Produire un formulaire HTML (POST) permettant de déclarer une autorisation de connexion sur un firewall applicatif. Cette autorisation est temporaire et limitée par plage IP v4 pour un utilisateur.

Contenu du formulaire :

- un champ username (caractères permis : a-z A-Z 0-9 -, longueur mini 6, longueur maxi 25)
- un champ date de début (format Y-m-d)
- un champ date de fin (format Y-m-d, obligatoirement postérieure à la date de début)
- un champ adresse IP de début de plage (IPV4)
- un champ adresse IP de fin de plage (IPV4, obligatoirement supérieur à l’adresse de début)

Vous validerez chacune de ces données à l’aide d'un seul appel à la fonction `filter_input_array`