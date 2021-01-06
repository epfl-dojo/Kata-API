restart:
	docker-compose down && docker-compose up --build

up:
	docker-compose up --build

exec:
	docker exec -it kata-api_php_1 /bin/bash

perms:
	sudo chown -R ${UID}:${GID} ./src
	sudo find ./src -type f -exec chmod 644 {} \;
	sudo find ./src -type d -exec chmod 755 {} \;
	sudo chmod -R 777 ./src/app/storage ./src/app/bootstrap/cache
