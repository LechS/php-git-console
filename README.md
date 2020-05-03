# php-git-console

## Założenia:
Na potrzeby realizacji zadania przyjęto, że aplikacja ma sprawdzać sha w publicznych repozytoriach serwisów takich jak Github.

## Architecture
Aplikacja stworzona z wykorzystaniem podejścia domenowego i inspirowana "Clean architecture" 
oraz podejściem framework agnostic.
Wyjątkiem od zasad jest sama komenda konsolowa Symfony. Spowodowane jest to kompromisem między czasem wykonania a jakością. 

## PROJECT setup
```
git clone git@github.com:LechS/php-git-console.git
docker-compose up -d
cd php-git-console
```

## USAGE

#### sprawdzenie hasha
``docker-compose exec php bin/console app:check-git-hash LechS/php-git-console master``
``docker-compose exec php bin/console app:check-git-hash LechS/php-git-console master --service github``

#### testy
``docker-compose exec php vendor/bin/phpunit``

#### cs-fixer
``docker-compose exec php vendor/bin/php-cs-fixer fix``

#### phpstan
``docker-compose exec php vendor/bin/phpstan analyse``