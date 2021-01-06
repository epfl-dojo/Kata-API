# Kata API
Kata : créer une [API](https://github.com/OAI/OpenAPI-Specification)
fonctionnelle avec [CRUD](https://www.codecademy.com/articles/what-is-crud) sur
les différentes tables d'une base de donnée MySQL.

## But
Cet exercice permet de travailler l'intégration de Docker dans un projet, la
création et l'utilisation d'une API.
L'idée est aussi d'apprendre les différentes [méthodes
HTTP](https://developer.mozilla.org/fr/docs/Web/HTTP/M%C3%A9thode) et de les
utiliser.

## Pré-requis
Ce Kata assume que vous êtes à l'aise avec
[Git](https://git-scm.com/), [Docker](https://www.docker.com/) et
[Docker-compose](https://docs.docker.com/compose/).

## Comment procéder
[Forkez](https://github.com/epfl-dojo/kata-api/#fork-destination-box) ce repo et
créez une branche (`git checkout -b username/langage` par exemple `git checkout
-b nicolasreymond/php`, depuis votre fork). Faites ensuite une pull request pour
l'ajouter à ce repo en vous ajoutant comme contributeur en bas de ce fichier.

## Mise en place
À chaque fois qu'il y a un changement dans un fichier docker :
```bash
docker-compose up --build
```
Et pour simplement démarrer les containers docker:
```bash
docker-compose up -d
```

## Objectifs
- [ ] Forcker le dépot Git
- [ ] Créer une nouvelle branche (ex. : `usermame/langage`)
- [ ] Ajouter un container Docker (pour le langage de votre choix) au docker-compose
- [ ] Comprendre comment détecter les types de [requêtes HTTP](https://developer.mozilla.org/fr/docs/Web/HTTP/M%C3%A9thode) (GET, POST, PUT, PATCH, DELETE)
- [ ] Mise en place du CRUD pour l'endpoint `/beer*`
   - [ ] Mise en place du **`C`**`reate`
   - [ ] Mise en place du **`R`**`ead`
   - [ ] Mise en place du **`U`**`pdate`
   - [ ] Mise en place du **`D`**`elete`
- [ ] Mise en place de la lecture des endpoints `/breweries`, `/categories` et `/styles`
- [ ] Tester l’API avec [postman](https://www.postman.com/), [curl](https://curl.haxx.se/), [httpie](https://httpie.org/), etc… et indiquer ces requêtes dans un fichier de résultats
- [ ] Faire une page qui documente l'utilisation de l’API (avec un example de requête pour chaques commandes)

Pour aller plus loin
- [ ] Se poser des questions sur la pagination dans le cas de résultats importants, par exemple en utilisant le HEADER et le méthode HTTP [HEAD](https://developer.mozilla.org/fr/docs/Web/HTTP/M%C3%A9thode/HEAD)
- [ ] Intégration de [swagger](https://swagger.io/tools/open-source/open-source-integrations/) dans le langage choisi


## Description des routes à utiliser

| Endpoint         | Résultat                                | Méthode  |
|----------------- |-----------------------------------------|:--------:|
|`/beers`          | Affiche toutes les bières               | GET      |
|`/beer`           | Ajouter une bière                       | POST     |
|`/beer/{id}`      | Affiche la bière qui à l'id `{id}`      | GET      |
|`/beer/{id}`      | Supprimer une bière                     | DELETE   |
|`/beer/{id}`      | Modifier une bière                      | PUT      |
|`/beer/{id}`      | Modifier partiellement une bière        | PATCH    |
|`/breweries`      | Affiche toutes les brasseries           | GET      |
|`/breweries/{id}` | Affiche la brasserie `{id}`             | GET      |
|`/categories`     | Affiche toutes les catégories           | GET      |
|`/categories/{id}`| Affiche la catégorie `{id}`             | GET      |
|`/styles`         | Affiche toutes les styles               | GET      |
|`/styles/{id}`    | Affiche le style `{id}`                 | GET      |


## Contributeurs (langages par ordre alphabétique)
[![saphirevert-repos][saphirevert-shield]][saphirevert-url]

[saphirevert-shield]: https://badgen.net/badge/Github/SaphireVert/green?icon=https://svgshare.com/i/Srf.svg
[saphirevert-url]: https://github.com/saphirevert/
