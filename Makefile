# Constants
APP = webmarketvue
APPMYSQL = dbmarketvue

DOCKER_COMPOSE = docker-compose
DOCKER = docker
SYNC = docker-sync-stack
ARTISAN = php artisan

## Environments
ENV_PHP = $(DOCKER) exec -it $(APP)

# Tools
COMPOSER = $(ENV_PHP) composer

#logs
logs:
	$(DOCKER) logs $(APP)

logs-sql:
	$(DOCKER) logs $(APPMYSQL)

# Tasks compose
start: docker-compose.yml
	$(DOCKER_COMPOSE) up -d

stop:  docker-compose.yml
	  $(DOCKER_COMPOSE) stop

#sync-start: docker-sync.yml
#	sudo $(SYNC) start
#
#sync-stop: docker-sync.yml
#	sudo $(SYNC) stop

#composer
req: composer.json
	$(COMPOSER) require ($PACKAGE)

req-dev:
	$(COMPOSER) require ($PACKAGE) --dev

composer-autoload:
	$(COMPOSER) dump-autoload

composer-cache:
	$(COMPOSER) clear-cache

#LARAVEL
#cache
cc:
	$(ENV_PHP) $(ARTISAN) cache:clear

optimize:
	$(ENV_PHP) $(ARTISAN) optimize:clear

view-cache:
	$(ENV_PHP) $(ARTISAN) view:cache

view-clear:
	$(ENV_PHP) $(ARTISAN) view:clear

#Database
migrate:
	$(ENV_PHP) $(ARTISAN) migrate

fresh:
	$(ENV_PHP) $(ARTISAN) migrate:fresh

fresh-seed:
	$(ENV_PHP) $(ARTISAN) migrate:fresh --seed

#Seeds
db-seeds:
	$(ENV_PHP) $(ARTISAN) db:seed

new-seeds:
	$(ENV_PHP) $(ARTISAN) make:seeder $(SEED)

#Factory
new-factory:
	$(ENV_PHP) $(ARTISAN) make:factory $(FACTORY)

#Base DB
new-table:
	$(ENV_PHP) $(ARTISAN) make:migration $(TABLE)

#Controllers
new-controller:
	$(ENV_PHP) $(ARTISAN) make:controller $(CONTROLLER)

#Models
new-model:
	$(ENV_PHP) $(ARTISAN) make:model $(MODEL)

#MCRUD
new-mcr:
	$(ENV_PHP) $(ARTISAN) make:model $(MCR) -mcr

#NPM
npm-init:
	$(ENV_PHP) npm init

npm-install:
	$(ENV_PHP) npm install

npm-run-dev:
	$(ENV_PHP) npm run dev

npm-watch:
	$(ENV_PHP) npm run watch

npm-run-prod:
	$(ENV_PHP) npm run prod

npm-update:
	$(ENV_PHP) npm -g update npm
