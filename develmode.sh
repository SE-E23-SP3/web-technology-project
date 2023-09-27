#!/bin/sh
if [ ! "$(id -u)" -eq 0 ]; then
	#Automatically rerun script with root
	exec sudo "$0" "$@"
fi

DOCKER_BIN="$(command -v docker)"
if [ ! -e "$DOCKER_BIN" ]; then
	DOCKER_BIN="$(command -v nerdctl)"
fi

HOST_PORT="8080"
GUEST_PORT="$HOST_PORT"

$DOCKER_BIN run --rm -it -v $PWD:/app -p "$HOST_PORT":"$GUEST_PORT" composer:latest php artisan serve --port "$GUEST_PORT"
