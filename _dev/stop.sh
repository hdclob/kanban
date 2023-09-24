#!/bin/bash

cd "${0%/*}"

echo "######Stopping docker containers...######\n\n"
docker-compose down
echo "######Docker containers stopped######\n\n"

exit 0