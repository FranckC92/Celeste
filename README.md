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
