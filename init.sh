#!/usr/bin/env bash
source "./shell-utils/helper.sh"
set -e
if [ -x "$(command -v docker)" ]; then
    process_info "Spinning up containers..."
    sudo docker-compose up --build -d
    success "Containers started"

    process_info "Installing dependencies..."
    sudo docker-compose exec propel-app sh -c "composer install && npm install"
    success "Dependencies installation completed"

    process_info "Running migrations..."
    sudo docker-compose exec propel-app sh -c "php artisan migrate --seed"
    success "Migration completed"

    process_info "Building frontend..."
    sudo docker-compose exec propel-app sh -c "npm run build"
    success "Frontend build successfully!"

    source "./shell-utils/edit-hosts-file.sh"
    success "Setup completed!"

else
  error "You need to install docker to continue this setup. To install docker, follow this link https://docs.docker.com/engine/install/"
fi
