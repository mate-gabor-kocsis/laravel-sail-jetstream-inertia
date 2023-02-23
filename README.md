<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Installation steps

## Clone repository
```
git clone <REPOSITORY URL>
```

## Create .env file
```
cp .env.example .env
```

## Install composer dependencies with docker
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

## Start container
```
sail up
```
add sail alias
```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

## Install npm packages
```
sail npm install
sail npm run dev
```

## Generate app key
```
sail artisan key:generate
```

## Run migrations
```
sail artisan migrate
```

## Run seeder
```
sail artisan db:seed
```

## Log in
```
http://laravel-sail-jetstream-inertia.test:85

user:   test@example.com
pass:   123456789
```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
