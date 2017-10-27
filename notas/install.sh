#!/bin/bash

sudo apt-get update
sudo apt-get install php7.0-xml

cd /var/www/public/notas
composer install
