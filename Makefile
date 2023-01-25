DOCKER_COMPOSE_PATH	=	./srcs/docker-compose.yml

DATA_PATH			= /home/croce/data
DB_PATH				= $(DATA_PATH)/db/
WP_PATH				= $(DATA_PATH)/wp/


all: start

#  up		Create and start containers
#  build	Build or rebuild services
start:
	@ mkdir -p $(DB_PATH) $(WP_PATH)
	@ sudo docker-compose -f $(DOCKER_COMPOSE_PATH) up --build

#  down		Stop and remove containers, networks, images, and volumes
stop:
	@ sudo docker-compose -f $(DOCKER_COMPOSE_PATH) down

#  docker system prune		remove all unused containers, networks, images (both dangling and unreferenced), and optionally, volumes.
#  --all	Remove all unused images not just dangling ones
#  --force  do not prompt for confirmation
clean: stop
	@ sudo docker system prune --all --force

re: clean all

.PHONY: all start stop clean re
