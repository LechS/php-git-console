# php-git-console

## ZAŁOŻENIA:
Na potrzeby realizacji zadania przyjęto, że aplikacja ma sprawdzać sha w publicznych repozytoriach serwisów takich jak Github.

## ARCHITECTURE
Aplikacja stworzona z wykorzystaniem podejścia domenowego i inspirowana "Clean architecture" 
oraz podejściem framework agnostic. 

## PROJECT SETUP
```
git clone git@github.com:LechS/php-git-console.git
cd php-git-console
docker-compose up -d
docker-compose exec php composer install
docker-compose exec php vendor/bin/phpunit
```

## USAGE

#### sprawdzenie hasha
```
docker-compose exec php bin/console app:check-git-hash LechS/php-git-console master
docker-compose exec php bin/console app:check-git-hash LechS/php-git-console master --service github
```

#### testy
``docker-compose exec php vendor/bin/phpunit``

#### cs-fixer
``docker-compose exec php vendor/bin/php-cs-fixer fix``

#### phpstan
``docker-compose exec php vendor/bin/phpstan analyse``
