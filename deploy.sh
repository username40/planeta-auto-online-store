#!/bin/bash
git pull origin master && composer install && yarn install && php artisan migrate --force && yarn build:site && yarn build:manage && pm2 restart planetavto-site && pm2 restart planetavto-manage && pm2 restart planetavto-placeholder
