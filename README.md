# Web Programming
### OS1 - 2112 - TICA - TK3-W8-S12

## Aplikasi Perhitungan Nilai - Team 2

<br>

```bash
$ docker run --rm --interactive --tty --volume "$PWD":/app composer create-project --prefer-dist laravel/laravel TK3-W8-S12
$ cd TK3-W8-S12/
$ docker run -v "$PWD":/usr/src/app -w /usr/src/app node npm --loglevel=info install -D tailwindcss postcss autoprefixer
$ docker run -v "$PWD":/usr/src/app -w /usr/src/app node npx --loglevel=info tailwindcss init
$ docker run -v "$PWD":/usr/src/app -w /usr/src/app node npm --loglevel=info run watch
```

<br>

```bash
$ docker network create mysql-net
$ docker run --network mysql-net --name mysql -e MYSQL_ROOT_PASSWORD=binus -e MYSQL_DATABASE=tk3 -e MYSQL_USER=binus -e MYSQL_PASSWORD=binus -p 3306:3306 -d mysql:latest
$ docker inspect mysql | grep IPAddress

$ docker run --network mysql-net -it --rm mysql mysql -hmysql -ubinus -p
```

<br>

```ini
DB_CONNECTION=mysql
DB_HOST=172.18.0.2
DB_PORT=3306
DB_DATABASE=tk3
DB_USERNAME=binus
DB_PASSWORD=binus
```

<br>

```bash
$ docker run --network mysql-net -it --rm -v "$PWD":/app -p 8000:8000 php bash
root@31d77b0aa211:/# cd /app/
root@31d77b0aa211:/app# docker-php-ext-install mysqli pdo pdo_mysql
root@31d77b0aa211:/app# php artisan make:controller NilaiController
root@31d77b0aa211:/app# php artisan make:migration nilai
root@31d77b0aa211:/app# php artisan migrate
root@31d77b0aa211:/app# php artisan serve --host 0.0.0.0
```
