# symfony_tournaments
git clone git@github.com:Zloradnij/kingsBounty.git \
cd kingsBounty

docker-compose build \
docker-compose up -d \
docker exec -it tour-php

cd /tournaments \
php bin/console make:migration \
php bin/console doctrine:migrations:migrate \
php bin/console asset-map:compile

register to http://localhost:8094/ (confirm - in database !!!)\
go to http://localhost:8094/world/my
