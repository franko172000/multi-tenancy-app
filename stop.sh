#!/usr/bin/env bash
source "./shell-utils/helper.sh"
set -e
if [ -x "$(command -v docker)" ]; then
    process_info "Stopping up containers..."
    sudo docker-compose down
    success "Containers Stopping"

else
  error "You need to install docker to continue this setup. To install docker, follow this link https://docs.docker.com/engine/install/"
fi
