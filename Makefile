include .env

install:
	@$(MAKE) -s down
	@$(MAKE) -s docker-build
	@$(MAKE) -s up

build: docker-build
restart: down up
up: docker-up
down: docker-down
ps:
	@docker ps

docker-up:
	@docker-compose -p ${INDEX} up -d
docker-down:
	@docker-compose -p ${INDEX} down --remove-orphans
docker-build: \
	docker-build-php-cli \
	docker-build-php-fpm \
	docker-build-nginx \
	docker-build-nodejs \
#	docker-build-mysql \
#	docker-build-redis

docker-build-nginx:
	@docker-compose -p ${INDEX} build nginx
docker-build-php-fpm:
	@docker-compose -p ${INDEX} build php-fpm
docker-build-php-cli:
	@docker-compose -p ${INDEX} build php-cli
docker-build-nodejs:
	@docker-compose -p ${INDEX} build nginx
#docker-build-mysql:
#	@docker-compose -p ${INDEX} build mysql --no-cache
#docker-build-redis:
#	@docker-compose -p ${INDEX} build redis --no-cache

docker-logs:
	@docker-compose -p ${INDEX} logs -f
shell:
	docker-compose -p ${INDEX} run --rm php-cli /bin/sh
php-fpm:
	@docker exec -it php-fpm /bin/sh


