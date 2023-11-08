#!/bin/sh

if [ ! -e ".env" ]; then
	cp .env.example .env
	echo "copying to .env" >&2
fi

composer install
php artisan serve --host 0.0.0.0 --port "$PORT"
