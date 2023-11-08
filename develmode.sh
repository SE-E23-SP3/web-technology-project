#!/bin/sh
if [ ! "$(id -u)" -eq 0 ] && [ "$(uname)" != "Darwin" ]; then
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



stderr() {
	printf "%s\n" "$@" 1>&2
}



DOCKER_BIN="$(command -v docker)"
if [ ! -e "$DOCKER_BIN" ]; then
	DOCKER_BIN="$(command -v nerdctl)"
fi

if [ ! -e ".env" ]; then
	cp .env.example .env
	echo "copying to .env" >&2
fi



onSigInt() {
	$DOCKER_BIN compose down
	exit 130
}


trap 'onSigInt' 2

PORT=8080

waitOnStart() {
	$DOCKER_BIN compose exec php timeout 600s sh -c "until curl -sf 'http://localhost:$PORT/health' -o /dev/null; do sleep 1; done"
	test "$?" -ne 1 || exit 1
	local MSG="$(cat <<-EOF
	/**********************************************************/
	/*                                                        */
	/*                                                        */
	/*                 Go to your browser at:                 */
	/*                 ${txBold}${fgGreen}http://localhost:${PORT}${txReset}                  */
	/*                  Use ${fgBlue}Ctrl+C${txReset} to exit                    */
	/*                                                        */
	/*                                                        */
	/**********************************************************/
	EOF
	)"

	stderr
	stderr "$MSG"
	stderr
}

set -x
$DOCKER_BIN compose up -d
test "$?" -ne 1 || exit $?
set +x

stderr
stderr "${fgBlue}Crtl-C to stop containers${txReset}"
stderr

waitOnStart &

$DOCKER_BIN compose logs -f php
