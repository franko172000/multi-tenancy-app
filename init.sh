#!/usr/bin/env bash

RED=$(tput setaf 1)
RESET=$(tput sgr0)
GREEN=$(tput setaf 2)
BLUE=$(tput setaf 4)
BOLD=$(tput bold)

function error()
{
	echo -e "${RED}ERROR: ${1}${RESET}"
	exit 1
}

function success()
{
	echo -e "${GREEN}${1}${RESET}"
}

function info()
{
	echo -e "${BLUE}${1}${RESET}"
}

function process_info()
{
    echo -e "${BOLD}⠿⠿⠿⠿ ${1}${RESET}"
}

set -e
if [ -x "$(command -v docker)" ]; then
    process_info "Spinning up containers..."
    sudo docker-compose up -d
    success "Containers started"

    process_info "Installing dependencies..."
    sudo docker-compose exec propel-app sh -c "composer install"
    success "Dependencies installation completed"

    process_info "Running migrations..."
    sudo docker-compose exec propel-app sh -c "php artisan migrate --seed"
    success "Migration completed"

else
  error "You need to install docker to continue this setup. To install docker, follow this link https://docs.docker.com/engine/install/"
fi
