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

# Preview 
![capture d ecran_2018-03-05_22-17-33](https://user-images.githubusercontent.com/15458329/37000213-fe9c2810-20c2-11e8-9791-c93ce48dd13d.png)

![capture d ecran_2018-03-05_22-18-23](https://user-images.githubusercontent.com/15458329/37000223-051dd2d8-20c3-11e8-95ec-a94763c3407c.png)


tips : verify entity 

```
bin/console do:sc:va --skip-sync
```


Todo : add player vs player search bar,
       mb add point for player ? to make ranked table
       add better search, cuz if we have 2 players with same firstname, we got status 500
