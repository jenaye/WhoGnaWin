Symfony Standard Edition (3.4)
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


Todo : add player vs player search bar,
       mb add point for player ? to make ranked table
       add better search, cuz if we have 2 players with same firstname, we got status 500
