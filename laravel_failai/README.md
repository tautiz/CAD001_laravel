## Klases darbas

### Kaip pasileisti projektą

- `git clone git@github.com:tautiz/CAD001_laravel.git mano_projektas`
- `cd mano_projektas`

Jei naudojate `composer`:
- `composer install`
- `cp .env.example .env`

Jei naudojate `docker`:
- `docker-compose up -d`
- `docker-compose exec <web> composer install`
- `docker-compose exec <web> cp .env.example .env`

** Naudokite `docker-compose ps` komandą, kad pamatytumėte, koks konteineris yra naudojamas kaip `<web>` serveris
