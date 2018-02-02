Symfony Standard Edition
========================

# Install #

```
composer install
php bin/console s:r

```

Build database:

```
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

```
php bin/console doctrine:fixtures:load
```


tips : verify entity 

```
bin/console do:sc:va --skip-sync
```


Todo : add player vs player search bar