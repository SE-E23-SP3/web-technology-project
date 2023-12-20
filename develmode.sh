#!/bin/sh
if [ ! "$(id -u)" -eq 0 ] && [ "$(uname)" != "Darwin" ]; then
	#Automatically rerun script with root
	exec sudo "$0" "$@"
fi



# CREDITS: https://github.com/MidnightRocket/posix-colors
if [ "${FORCE_COLOR:-"false"}" = "true" ] || [ -t 1 ] && [ -t 2 ] && [ "${USE_COLOR:-"true"}" = "true" ]; then readonly T_USE_COLOR=true; else unset T_USE_COLOR; fi
# Need to put this in variable on its own.
# It cannot be directly in parameter expansion below because then it won't work in bash and ksh
T_ESC="\033[" # ¯\_(ツ)_/¯
readonly T_ESC="${T_USE_COLOR+"$T_ESC"}"
###   -----   RESET FORMAT OR COLOR   -----   ###
readonly TR="${T_ESC}${T_USE_COLOR+"0m"}"                  TR_F="${T_ESC}${T_USE_COLOR+"39m"}"               TR_B="${T_ESC}${T_USE_COLOR+"49m"}"
###   -----   TEXT FORMATTING   -----   ###
readonly T_BOLD="${T_ESC}${T_USE_COLOR+"1m"}"              T_DIM="${T_ESC}${T_USE_COLOR+"2m"}"               T_ITALIC="${T_ESC}${T_USE_COLOR+"3m"}"            T_UNDERLINE="${T_ESC}${T_USE_COLOR+"4m"}"
readonly T_BLINK="${T_ESC}${T_USE_COLOR+"5m"}"             T_REVERSE="${T_ESC}${T_USE_COLOR+"7m"}"           T_HIDDEN="${T_ESC}${T_USE_COLOR+"8m"}"            T_STRIKE="${T_ESC}${T_USE_COLOR+"9m"}"
###   -----   FOREGROUND COLORS   -----   ###
readonly TF_BLACK="${T_ESC}${T_USE_COLOR+"30m"}"           TF_RED="${T_ESC}${T_USE_COLOR+"31m"}"             TF_GREEN="${T_ESC}${T_USE_COLOR+"32m"}"           TF_YELLOW="${T_ESC}${T_USE_COLOR+"33m"}"          TF_BLUE="${T_ESC}${T_USE_COLOR+"34m"}"            TF_MAGENTA="${T_ESC}${T_USE_COLOR+"35m"}"         TF_CYAN="${T_ESC}${T_USE_COLOR+"36m"}"            TF_DARK_GRAY="${T_ESC}${T_USE_COLOR+"90m"}"
readonly TF_WHITE="${T_ESC}${T_USE_COLOR+"97m"}"           TF_BRIGHT_RED="${T_ESC}${T_USE_COLOR+"91m"}"      TF_BRIGHT_GREEN="${T_ESC}${T_USE_COLOR+"92m"}"    TF_BRIGHT_YELLOW="${T_ESC}${T_USE_COLOR+"93m"}"   TF_BRIGHT_BLUE="${T_ESC}${T_USE_COLOR+"94m"}"     TF_BRIGHT_MAGENTA="${T_ESC}${T_USE_COLOR+"95m"}"  TF_BRIGHT_CYAN="${T_ESC}${T_USE_COLOR+"96m"}"     TF_BRIGHT_GRAY="${T_ESC}${T_USE_COLOR+"37m"}"
###   -----   BACKGROUND COLORS   -----   ###
readonly TB_BLACK="${T_ESC}${T_USE_COLOR+"40m"}"           TB_RED="${T_ESC}${T_USE_COLOR+"41m"}"             TB_GREEN="${T_ESC}${T_USE_COLOR+"42m"}"           TB_YELLOW="${T_ESC}${T_USE_COLOR+"43m"}"          TB_BLUE="${T_ESC}${T_USE_COLOR+"44m"}"            TB_MAGENTA="${T_ESC}${T_USE_COLOR+"45m"}"         TB_CYAN="${T_ESC}${T_USE_COLOR+"46m"}"            TB_DARK_GRAY="${T_ESC}${T_USE_COLOR+"100m"}"
readonly TB_WHITE="${T_ESC}${T_USE_COLOR+"107m"}"          TB_BRIGHT_RED="${T_ESC}${T_USE_COLOR+"101m"}"     TB_BRIGHT_GREEN="${T_ESC}${T_USE_COLOR+"102m"}"   TB_BRIGHT_YELLOW="${T_ESC}${T_USE_COLOR+"103m"}"  TB_BRIGHT_BLUE="${T_ESC}${T_USE_COLOR+"104m"}"    TB_BRIGHT_MAGENTA="${T_ESC}${T_USE_COLOR+"105m"}" TB_BRIGHT_CYAN="${T_ESC}${T_USE_COLOR+"106m"}"    TB_BRIGHT_GRAY="${T_ESC}${T_USE_COLOR+"47m"}"


# Helper functions for echoing/printing text.
# printf is fully posix compliant and is generally safer than echo.
# These auto resets formating
print() { printf "%b%b" "${1-""}" "${2-"${TR}\\n"}"; }
stderr() { print "$@" 1>&2; }






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


HELP_MSG="$(cat <<-EOF
	/**********************************************************/
	/*                                                        */
	/*                                                        */
	/*               If you run into an error                 */
	/*         Manually run '${T_BOLD}sudo docker compose up${TR}'          */
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
	/*       Try manually run '${T_BOLD}sudo docker compose up${TR}'        */
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





ENV_FILE=".env"
if [ ! -e "$ENV_FILE" ]; then
	ENV_EXAMPLE_FILE=".env.example"
	stderr
	stderr "Generating ${T_BOLD}${TF_BLUE}.env${TR} file"
	stderr "Generating ${T_BOLD}${TF_BLUE}DB_PASSWORD${TR}"
	stderr "Generating ${T_BOLD}${TF_BLUE}Application Key${TR}"
	stderr

	cp -P "$ENV_EXAMPLE_FILE" "$ENV_FILE" # First copy file over with perimission preserved

	DB_PASSWORD="$(cat /dev/random | LC_ALL=C tr -dc 'A-Za-z0-9' | head -c 32)" APP_KEY="base64:$(cat /dev/random | head -c 32 | base64)" \
		awk 'BEGIN{FS="=";OFS="="}{if ($1 in ENVIRON){print $1,ENVIRON[$1]}else{print}}' "$ENV_EXAMPLE_FILE" > "$ENV_FILE"

	chmod 600 "$ENV_FILE"
	stderr
fi




$DOCKER_BIN compose up -d || detectExitCode "$?"



$DOCKER_BIN compose logs -f php || detectExitCode "$?"
