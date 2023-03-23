<p align="center"><a href="https://meetbrackets.com" target="_blank"><img src="https://meetbrackets.com/images/logo.svg" width="400"></a></p>

## Setting up project (AllianceBook)

Run Docker
```bash
docker-compose up -d
```
This command creates and runs docker images necessary for the project\
If the dependencies are not installed automatically, you need to install them via composer.\\

For VUE application run following commands
```bash
cd client
npm install
npm run serve
```

VUE app is preconfigured for working with laravel application

## Unfortunately, the assignment could not be completed

- Pagination
- Animations

## PHPStan

Run following command

```bash
vendor/bin/phpstan analyse -c .phpstan/config.neon --memory-limit 1G
```
