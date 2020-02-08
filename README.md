# Laravel example project

### How to run

```bash
cp .env.example .env
docker-composer up -d
```

## php-fpm container
```bash
docker-compose exec php-fpm bash
cp .env.example .env
composer install
```