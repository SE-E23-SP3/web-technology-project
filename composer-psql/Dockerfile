FROM docker.io/composer:latest


# https://stackoverflow.com/questions/53076946/how-to-fix-doctrine-dbal-driver-pdoexception-error-in-docker-with-laravel-5-a
RUN apk add --no-cache postgresql-dev && \
	docker-php-ext-install pgsql pdo_pgsql
