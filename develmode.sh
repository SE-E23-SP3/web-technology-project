#!/bin/sh
if [ ! "$(id -u)" -eq 0 ]; then
	#Automatically rerun script with root
	exec sudo "$0" "$@"
fi

DOCKER_BIN="$(command -v docker)"
if [ ! -e "$DOCKER_BIN" ]; then
	DOCKER_BIN="$(command -v nerdctl)"
fi

if [ ! -e ".env" ]; then
	cp .env.example .env
	echo "copying to .env" >&2
fi
HOST_PORT="8080"
GUEST_PORT="$HOST_PORT"


set -e
$DOCKER_BIN run --rm -it --volume "$PWD":/app composer:latest composer install
$DOCKER_BIN run --rm -it -v "$PWD":/app -p "$HOST_PORT":"$GUEST_PORT" composer:latest php artisan serve --port "$GUEST_PORT"
