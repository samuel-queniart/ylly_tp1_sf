.PHONY: install lint lint-fix test help
.DEFAULT_GOAL= help

## Help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-10s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

install: ## Install project
	# Composer
	composer install --verbose
	# Database
	php bin/console doctrine:database:create --if-not-exists
	php bin/console doctrine:schema:update --force
	# Fixture
	php bin/console doctrine:fixtures:load --no-interaction

lint: ## Lint without apply change
	php-cs-fixer fix --config=.php_cs --dry-run --diff --show-progress=dots

lint-fix: ## Lint apply change
	php-cs-fixer fix --config=.php_cs --diff --show-progress=dots

test: ## Launch test
	phpunit -c phpunit.xml
