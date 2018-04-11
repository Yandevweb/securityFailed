#!/usr/bin/env bash

docker stop $(docker ps -q)
docker rm $(docker ps -aq)

docker build -t php_woot .

docker run -d --name mysql -e MYSQL_ROOT_PASSWORD=root mysql:5.7
docker run -d --link mysql:mysql -p 80:80 -v "$PWD/app":/var/www/html php_woot
