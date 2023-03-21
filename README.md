<p align="center"><a href="https://meetbrackets.com" target="_blank"><img src="https://meetbrackets.com/images/logo.svg" width="400"></a></p>


## Setting up project (Planets explorer)

Run via Docker
```bash
docker-compose up -d
```
This command creates and runs docker images necessary for the project\
If the dependencies are not install automatically, you need to install them via composer.\\

Available routes:

```bash
/en/planets
/en/logs
```

## GraphQL

GraphQL API is available at endpoint\
/graphql

Example GET request:

```bash
/graphql?query={aggregatedPlanets{name, terrain, species{species_name}}}
```

## Synchronize the list of all planets

Run command to initialize list of planets

```bash
php artisan syncPlanets:sync
```

This command prints number of added planets. 
Synchronize of the planets needs to be updated and improved for another planet exploration.

## Store user progress

For store user progress in hostile environment use API endpoint\
POST /api/log

Parameters:
```bash
mood: string
weather: string
gps: string
note: string
```

## PHPStan

Run following command

```bash
vendor/bin/phpstan analyse -c .phpstan/config.neon --memory-limit 1G
```

## Tests

Run following command

```bash
php artisan test
```
