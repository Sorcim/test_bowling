up:
	docker-compose up -d
	docker-compose exec lemonde_app composer install

phpunit:
	docker-compose exec lemonde_app vendor/bin/phpunit

stop:
	docker-compose down

commit:
	docker-compose exec lemonde_app ./vendor/bin/grumphp run -n
