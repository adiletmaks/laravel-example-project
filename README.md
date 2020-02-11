# Laravel example project

### Clone

```bash
git clone https://github.com/adiletmaks/laravel-example-project.git
cd laravel-example-project
cp .env.example .env
```

## Run
```bash
docker-compose up -d
docker-compose exec php-fpm bash
# cp .env.example .env
# composer install
```

### Keys
```bash
# php artisan key:generate
# php artisan jwt:secret
```

### Database
```bash
# php artisan migrate --seed
```

### Adminer
- http://localhost:8080/

### Test user
- admin@admin.com
- admin