#!/bin/bash

cd "${0%/*}"

sh ./stop.sh

echo "######Building and starting docker containers...######\n\n"
docker-compose build
docker-compose up
echo "######Docker containers built and started######\n\n"

exit 0