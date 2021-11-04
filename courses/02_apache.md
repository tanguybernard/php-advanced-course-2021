# Apache


## Flag

### [P]

L'utilisation du drapeau [P] entraîne le traitement de la requête par le module mod_proxy, et ceci via une requête de mandataire. Par exemple, si vous voulez que toutes les requêtes d'images soient traitées par un serveur d'images annexe, vous pouvez utiliser une règle de ce style :

    RewriteRule "/(.*)\.(jpg|gif|png)$" "http://images.example.com/$1.$2" [P]

### [NC]

Insensible à la casse (.jpg ou .JPG) OK

    RewriteRule "(.*\.(jpg|gif|png))$" "http://images.example.com$1" [P, NC]


### [QSA]

Avec le drapeau [QSA], une requête pour /pages/123?one=two sera réécrite en /page.php?page=123&one=two. Sans le drapeau [QSA], la même requête sera réécrite en /page.php?page=123 - autrement dit, la chaîne de requête (query string) existante sera supprimée.


## Credits

https://httpd.apache.org/docs/2.4/fr/rewrite/flags.html