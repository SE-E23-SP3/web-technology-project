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




onSigInt() {
	$DOCKER_BIN compose down
	exit 130
}


trap 'onSigInt' 2

PORT=8080

waitOnStart() {
	$DOCKER_BIN compose exec php timeout 1200s sh -c "until curl -sf 'http://localhost:$PORT/health' -o /dev/null; do sleep 1; done"
	test "$?" -ne 1 || exit 1
	local MSG="$(cat <<-EOF
	/**********************************************************/
	/*                                                        */
	/*                                                        */
	/*                 Go to your browser at:                 */
	/*                 ${txBold}${fgGreen}http://127.0.0.1:${PORT}${txReset}                  */
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

HELP_MSG="$(cat <<-EOF
	/**********************************************************/
	/*                                                        */
	/*                                                        */
	/*               If you run into an error                 */
	/*         Manually run '${txBold}sudo docker compose up${txReset}'          */
	/*              'sudo' may not be necessay.               */
	/*                                                        */
	/*                                                        */
	/**********************************************************/
EOF
)"

stderr "$HELP_MSG"

ERROR_MSG="$(cat <<-EOF
	/**********************************************************/
	/*                                                        */
	/*                                                        */
	/*                 An error has occurred.                 */
	/*       Try manually run '${txBold}sudo docker compose up${txReset}'        */
	/*              'sudo' may not be necessay.               */
	/*                                                        */
	/*                                                        */
	/**********************************************************/
EOF
)"

detectExitCode() {
	if [ "$1" -eq 0 ]; then
		return 0
	fi
	stderr "$ERROR_MSG"
	exit "$1"
}





if [ ! -e ".env" ]; then
	ENV_EXAMPLE_FILE=".env.example"
	ENV_FILE=".env"
	stderr "copying to .env"
	stderr "Generating DB_PASSWORD"
	stderr "Generating application key"

	DB_PASSWORD="$(cat /dev/random | LC_ALL=C tr -dc 'A-Za-z0-9' | head -c 32)" APP_KEY="base64:$(cat /dev/random | head -c 32 | base64)" \
		awk 'BEGIN{FS="=";OFS="="}{if ($1 in ENVIRON){print $1,ENVIRON[$1]}else{print}}' "$ENV_EXAMPLE_FILE" > "$ENV_FILE"

	chown --reference="$ENV_EXAMPLE_FILE" "$ENV_FILE" | true # may fail on MacOS, that is okay
	chmod 600 "$ENV_FILE"
	stderr
fi




$DOCKER_BIN compose up -d
detectExitCode $?



$DOCKER_BIN compose logs -f php
detectExitCode $?
