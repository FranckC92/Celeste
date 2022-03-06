# Celeste

Développement d'une application de gestion d'une "Maison des Jeunes".

## Développement

### Installation du projet

Se déplacer dans l'espace de travail et récupérer le projet depuis les sources.

```bash
cd ~/Code
git clone https://github.com/FranckC92/Celeste.git Celeste
```

Se déplacer dans le dossier du projet et installer les composants.

```bash
cd Celeste
symfony composer install
```

Créer la base de données et installer la dernière version des tables.

```bash
symfony console doctrine:database:create --if-not-exists
symfony console doctrine:migration:migrate
symfony console doctrine:fixtures:load
```

Démarrage du serveur PHP.

```bash
php                               \
  -S 0.0.0.0:8000                 \
  -t public                       \
  -dxdebug.mode=debug             \
  -dxdebug.start_with_request=yes
```

### Contribuer au développement

Par étape :

1. Créer une entité
2. Gérer les relations entre entités
3. Migrer la base de données
4. Insérer des données avec les fixtures
5. Générer un CRUD pour l'administration
6. Générer les pages publiques
7. Appliquer le style les pages d'admin et publiques
8. Gérer les accès aux pages

#### Créer une entité

```bash
$ symfony console make:entity Commentaire                                                                  [16:55:46]

 created: src/Entity/Commentaire.php
 created: src/Repository/CommentaireRepository.php

 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 >



  Success!


 Next: When you're ready, create a migration with php bin/console make:migration

```

#### Migrer la base de données

```bash
$ symfony console make:migration                                                                           [16:56:26]



  Success!


 Next: Review the new migration "migrations/Version20220306155729.php"
 Then: Run the migration with php bin/console doctrine:migrations:migrate
 See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html

```

#### Insérer des données avec les fixtures

```bash
$ symfony console make:fixtures CommentaireFixtures                                                        [16:57:59]

 created: src/DataFixtures/CommentaireFixtures.php


  Success!


 Next: Open your new fixtures class and start customizing it.
 Load your fixtures by running: php bin/console doctrine:fixtures:load
 Docs: https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html

```

#### Générer un CRUD pour l'administration

```bash
$ symfony console make:crud Commentaire                                                                    [16:59:35]

 Choose a name for your controller class (e.g. CommentaireController) [CommentaireController]:
 > CommentaireAdminController

 created: src/Controller/CommentaireAdminController.php
 created: src/Form/CommentaireType.php
 created: templates/commentaire_admin/_delete_form.html.twig
 created: templates/commentaire_admin/_form.html.twig
 created: templates/commentaire_admin/edit.html.twig
 created: templates/commentaire_admin/index.html.twig
 created: templates/commentaire_admin/new.html.twig
 created: templates/commentaire_admin/show.html.twig


  Success!


 Next: Check your new CRUD by going to /commentaire/admin/

```

#### Générer les pages publiques

```bash
$ symfony console make:crud Commentaire                                                                    [17:01:01]

 Choose a name for your controller class (e.g. CommentaireController) [CommentaireController]:
 > CommentaireController

 created: src/Controller/CommentaireController.php
 created: src/Form/Commentaire1Type.php
 created: templates/commentaire/_delete_form.html.twig
 created: templates/commentaire/_form.html.twig
 created: templates/commentaire/edit.html.twig
 created: templates/commentaire/index.html.twig
 created: templates/commentaire/new.html.twig
 created: templates/commentaire/show.html.twig


  Success!


 Next: Check your new CRUD by going to /commentaire/

```

#### Appliquer le style les pages d'admin et publiques

```text
templates/commentaire
├── _delete_form.html.twig
├── edit.html.twig
├── _form.html.twig
├── index.html.twig
├── new.html.twig
└── show.html.twig

templates/commentaire_admin
├── _delete_form.html.twig
├── edit.html.twig
├── _form.html.twig
├── index.html.twig
├── new.html.twig
└── show.html.twig

0 directories, 12 files

```

#### Gérer les accès aux pages

[A faire]
