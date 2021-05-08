![Logo](https://banners.beyondco.de/Loja%20demonstra%C3%A7%C3%A3o.jpeg?theme=dark&packageManager=&packageName=LeandroRolim%2Floja-simples&pattern=hideout&style=style_2&description=API+Rest+em+Laravel&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=LeandroRolim_loja-simples&metric=alert_status)](https://sonarcloud.io/dashboard?id=LeandroRolim_loja-simples)

# Loja de demonstração

API Rest desenvolvida em laravel para uma loja de demonstração

## Funcionalidades

- CRUD produtos
- CRUD cupons
- CRUD usuários
- Cross platform

## deploy local
O ambiente de desenvolvimento foi construído usando o [Laravel Sail](https://laravel.com/docs/8.x/sail)
```shell
  composer install
  ./vendor/bin/sail up -d
```
Acesse: [localhost](http://localhost)

## Testes

### PHP CodeSniffer
```shell
  ./vendor/bin/phpcs --standard=psr12 app
```

###Psalm
```shell
  ./vendor/bin/psalm
```

###PHP Unit
```shell
  sail test
```

## Autor

- [@LeandroRolim](https://www.github.com/LeandroRolim)

[http://localhost]: http://localhost

[Laravel]: https://laravel.com/docs/8.x/sail
