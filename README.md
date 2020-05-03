# php-git-console

## Założenia:
Na potrzeby realizacji zadania przyjęto, że aplikacja ma sprawdzać sha w publicznych repozytoriach serwisów takich jak Github.

## PROJECT setup
```
git clone git@github.com:LechS/php-git-console.git
docker-compose up -d
cd php-git-console
```

## USAGE

#### sprawdzenie hasha
``docker-compose exec php bin/console app:check-git-hash LechS/php-git-console master``

#### testy
``docker-compose exec php vendor/bin/phpunit``

#### cs-fixer
``docker-compose exec php vendor/bin/php-cs-fixer fix``

#### phpstan
``docker-compose exec php vendor/bin/phpstan analyse``