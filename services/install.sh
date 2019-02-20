#!/bin/bash
SERVICES=('jobs' 'admin')
COUNT=${#SERVICES[@]}
for ((i = 0; i < COUNT; i++)); do
  SERVICE=${SERVICES[${i}]}
  echo "******** Installing " ${SERVICE} "********"
  cd ${SERVICE}
  composer install
  cd ..
done
