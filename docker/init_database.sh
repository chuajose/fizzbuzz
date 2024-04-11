#!/bin/bash
echo "Intalling composer dependencies..."
composer install
echo "Waiting for update database to start..."
bin/console doctrine:schema:update --force
echo "Generating fixtures..."
php bin/console doctrine:fixtures:load --no-interaction