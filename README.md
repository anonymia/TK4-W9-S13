# Web Programming
### OS1 - 2112 - TICA - TK4-W9-S13

## Aplikasi Video Streaming - Team 2

<br>

```bash
$ docker run --rm --interactive --tty --volume "$PWD":/app composer create-project --prefer-dist laravel/laravel TK4-W9-S13
$ cd TK4-W9-S13/
$ docker run --rm --interactive --tty --volume "$PWD":/app composer require xantios/mimey
$ docker run -v "$PWD":/usr/src/app -w /usr/src/app node npm --loglevel=info install -D tailwindcss postcss autoprefixer
$ docker run -v "$PWD":/usr/src/app -w /usr/src/app node npx --loglevel=info tailwindcss init
$ docker run -v "$PWD":/usr/src/app -w /usr/src/app node npm --loglevel=info run watch
```

<br>

```bash
$ docker network create mysql-net
$ docker run --network mysql-net --name mysql -e MYSQL_ROOT_PASSWORD=binus -e MYSQL_DATABASE=tk4 -e MYSQL_USER=binus -e MYSQL_PASSWORD=binus -p 3306:3306 -d mysql:latest
$ docker inspect mysql | grep IPAddress

$ docker run --network mysql-net -it --rm mysql mysql -hmysql -ubinus -p
```

<br>

```ini
DB_CONNECTION=mysql
DB_HOST=172.18.0.2
DB_PORT=3306
DB_DATABASE=tk4
DB_USERNAME=binus
DB_PASSWORD=binus
```

<br>

```bash
$ docker run --network mysql-net -it --rm -v "$PWD":/app -p 8000:8000 php bash
root@2803e298f4ad:/# cd /app/
root@2803e298f4ad:/app# echo "post_max_size = 200M" >> /usr/local/etc/php/conf.d/user.ini
root@2803e298f4ad:/app# echo "upload_max_filesize = 100M" >> /usr/local/etc/php/conf.d/user.ini
root@2803e298f4ad:/app# docker-php-ext-install mysqli pdo pdo_mysql
root@2803e298f4ad:/app# php artisan make:model Video --controller --migration
root@2803e298f4ad:/app# php artisan migrate
root@2803e298f4ad:/app# php artisan serve --host 0.0.0.0
```
