init:
	composer install

	@if [ ! -f .env ];\
		then cp .env.example .env;\
		echo "Copied from .env.example";\
		php artisan key:generate;\
	fi

	php artisan vendor:publish --tag=lfm_public
	php artisan vendor:publish --tag=lfm_config
	touch database/database.sqlite
	php artisan migrate:refresh --seed

update:
	composer update unisharp/laravel-filemanager
	php artisan vendor:publish --tag=lfm_public --force
	php artisan vendor:publish --tag=lfm_config --force

test:
	@echo "PSR-2 Testing"
	./vendor/squizlabs/php_codesniffer/bin/phpcs --standard=PSR2 app
	@echo "End-To-End Testing"
	# vendor/bin/phpunit vendor/unisharp/laravel-filemanager/tests/ApiTest.php
