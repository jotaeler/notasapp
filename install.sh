#!/bin/bash

echo "Ejecutando apt-get update..."
sudo apt-get update
echo "Ejecutando apt-get install php7.0-xml"
sudo apt-get install php7.0-xml
echo "Reiniciando apache..."
sudo service apache2 restart

echo "Instalando dependencias del proyecto con composer"

cd /var/www/public/notas
composer install
