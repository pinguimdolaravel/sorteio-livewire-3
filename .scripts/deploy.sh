#!/bin/bash

# entro no modo de manutenção
(php artisan down) || true

# pego as mudanças || true
git pull origin production

# instalar composer
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# optimize
php artisan optimize

# compilar os assets
# nvm
export NVM_DIR=~/.nvm
source ~/.nvm/nvm.sh

npm install --yes
npm run build

# migrations
php artisan migrate --force

# sair do modo de manutenção
php artisan up
