#!/bin/sh
if [ ! "$(id -u)" -eq 0 ]; then
	#Automatically rerun script with root
	exec sudo "$0" "$@"
fi









#https://www.man7.org/linux/man-pages/man5/terminfo.5.html
# background color using ANSI escape
bgBlack="$(tput setab 0)"
bgRed="$(tput setab 1)"
bgGreen="$(tput setab 2)"
bgYellow="$(tput setab 3)"
bgBlue="$(tput setab 4)"
bgMagenta="$(tput setab 5)"
bgCyan="$(tput setab 6)"
bgWhite="$(tput setab 7)"
# foreground color using ANSI escape
fgBLack="$(tput setaf 0)"
fgRed="$(tput setaf 1)"
fgGreen="$(tput setaf 2)"
fgYellow="$(tput setaf 3)"
fgBlue="$(tput setaf 4)"
fgMagenta="$(tput setaf 5)"
fgCyan="$(tput setaf 6)"
fgWhite="$(tput setaf 7)"
# text editing options
txBold="$(tput bold)"
# https://en.wikipedia.org/wiki/ANSI_escape_code#SGR_(Select_Graphic_Rendition)_parameters
txItalic="\e[3m"
txDim="$(tput dim)"
txUnderline="$(tput smul)"
txEndUnder="$(tput rmul)"
txReverse="$(tput rev)"
txStandout="$(tput smso)"
txEndStand="$(tput rmso)"
txBlink="$(tput blink)"
txReset="$(tput sgr0)"

runcmd() {
	# https://unix.stackexchange.com/a/65819
	# https://stackoverflow.com/a/57839821
	printf "CMD: ${fgBlue}%s${txReset}\n" "$(printf '%s ' $@)" 1>&2
	$@
	EXIT_CODE="$?"
	if [ ! "$EXIT_CODE" = 0 ]; then
		exit "$EXIT_CODE"
	fi
}






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


set -x
$DOCKER_BIN run --rm -it --volume "$PWD":/app composer:latest composer install
$DOCKER_BIN run --rm -it -v "$PWD":/app -p "$HOST_PORT":"$GUEST_PORT" composer:latest php artisan serve --host 0.0.0.0 --port "$GUEST_PORT"
set +x
