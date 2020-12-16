restart:
	docker-compose down && docker-compose up --build

up:
	docker-compose up

exec:
	docker exec -it kata-api_php_1 /bin/bash
