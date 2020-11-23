ROOT_DIR=$(shell pwd)

DOCKER_COMPOSE=docker-compose
PHP_RUN=$(DOCKER_COMPOSE) run --rm -u www-data php php
PHP_RUN_IN_MEMORY=$(DOCKER_COMPOSE) run -e APP_ENV=in_memory --rm -u www-data php php
PHP_RUN_IN_DATABASE=$(DOCKER_COMPOSE) run -e APP_ENV=in_database --rm -u www-data php php
PHP_EXEC=$(DOCKER_COMPOSE) exec fpm php
YARN_EXEC=$(DOCKER_COMPOSE) run --rm -u node node yarn

CI ?= false

#### Docker ####
.PHONY: up
up:
	$(DOCKER_COMPOSE) up -d --remove-orphan

.PHONY: down
down:
	$(DOCKER_COMPOSE) down -v

.PHONY: dev
dev:
	DOCKER_BUILDKIT=1 docker image build --progress=plain --pull --tag hexagonal-workshop/dev/php:7.4 --target dev infra

.PHONY: prod
prod:
	DOCKER_BUILDKIT=1 docker image build --progress=plain --pull --tag hexagonal-workshop/prod:${IMAGE_TAG} --target prod infra

### Tools ###
.PHONY: sf
sf:
	$(PHP_RUN) bin/console ${F}

### Install ####
.PHONY: composer
composer:
	$(PHP_RUN) /usr/local/bin/composer ${F}

##################################################### BookStore test ###################################################
.PHONY: book-store-phpstan
book-store-phpstan:
	$(PHP_RUN) vendor/bin/phpstan analyse src/BookStore --level=7 -c phpstan.neon

.PHONY: book-store-cs
book-store-cs: ## Run book-store Coding Style fixer
	$(PHP_RUN) vendor/bin/php-cs-fixer fix --config=config/tests/book_store/.php_cs --diff

.PHONY: book-store-phpspec
book-store-phpspec: ## Run book-store PHPSpec
	$(PHP_RUN) vendor/bin/phpspec run --config config/tests/book_store/phpspec.yml

.PHONY: book-store-phpspec-desc
book-store-phpspec-desc: ## Run book-store PHPSpec describe
	$(PHP_RUN) vendor/bin/phpspec describe --config config/tests/book_store/phpspec.yml

.PHONY: book-store-acceptance
book-store-acceptance: ## Run book-store acceptance tests
	$(PHP_RUN_IN_MEMORY) vendor/bin/behat -p book_store_acceptance -f progress -c config/tests/book_store/behat.yml

.PHONY: book-store-end-to-end-api
book-store-end-to-end-api: ## Run book-store end to end tests
	 $(PHP_RUN_IN_DATABASE) vendor/bin/behat -p book_store_end_to_end_api -f progress -c config/tests/book_store/behat.yml

.PHONY: book-store-tests ## Run all the book-store tests
book-store-tests: book-store-phpstan book-store-cs book-store-phpspec book-store-acceptance book-store-end-to-end-api
