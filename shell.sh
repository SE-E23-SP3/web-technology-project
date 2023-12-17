#!/bin/sh
#


if [ ! "$(id -u)" -eq 0 ] && [ "$(uname)" != "Darwin" ]; then
	#Automatically rerun script with root
	exec sudo "$0" "$@"
fi

DOCKER_BIN="$(command -v docker)"
if [ ! -e "$DOCKER_BIN" ]; then
	DOCKER_BIN="$(command -v nerdctl)"
fi

$DOCKER_BIN compose exec -it php bash
