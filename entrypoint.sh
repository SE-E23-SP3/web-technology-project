#!/bin/sh


ESeq="\033["
RCol="$ESeq"'0m'    # Text Reset

# Regular               Bold                    Underline               High Intensity          BoldHigh Intens         Background              High Intensity Backgrounds
Bla="$ESeq"'0;30m';     BBla="$ESeq"'1;30m';    UBla="$ESeq"'4;30m';    IBla="$ESeq"'0;90m';    BIBla="$ESeq"'1;90m';   On_Bla="$ESeq"'40m';    On_IBla="$ESeq"'0;100m';
Red="$ESeq"'0;31m';     BRed="$ESeq"'1;31m';    URed="$ESeq"'4;31m';    IRed="$ESeq"'0;91m';    BIRed="$ESeq"'1;91m';   On_Red="$ESeq"'41m';    On_IRed="$ESeq"'0;101m';
Gre="$ESeq"'0;32m';     BGre="$ESeq"'1;32m';    UGre="$ESeq"'4;32m';    IGre="$ESeq"'0;92m';    BIGre="$ESeq"'1;92m';   On_Gre="$ESeq"'42m';    On_IGre="$ESeq"'0;102m';
Yel="$ESeq"'0;33m';     BYel="$ESeq"'1;33m';    UYel="$ESeq"'4;33m';    IYel="$ESeq"'0;93m';    BIYel="$ESeq"'1;93m';   On_Yel="$ESeq"'43m';    On_IYel="$ESeq"'0;103m';
Blu="$ESeq"'0;34m';     BBlu="$ESeq"'1;34m';    UBlu="$ESeq"'4;34m';    IBlu="$ESeq"'0;94m';    BIBlu="$ESeq"'1;94m';   On_Blu="$ESeq"'44m';    On_IBlu="$ESeq"'0;104m';
Pur="$ESeq"'0;35m';     BPur="$ESeq"'1;35m';    UPur="$ESeq"'4;35m';    IPur="$ESeq"'0;95m';    BIPur="$ESeq"'1;95m';   On_Pur="$ESeq"'45m';    On_IPur="$ESeq"'0;105m';
Cya="$ESeq"'0;36m';     BCya="$ESeq"'1;36m';    UCya="$ESeq"'4;36m';    ICya="$ESeq"'0;96m';    BICya="$ESeq"'1;96m';   On_Cya="$ESeq"'46m';    On_ICya="$ESeq"'0;106m';
Whi="$ESeq"'0;37m';     BWhi="$ESeq"'1;37m';    UWhi="$ESeq"'4;37m';    IWhi="$ESeq"'0;97m';    BIWhi="$ESeq"'1;97m';   On_Whi="$ESeq"'47m';    On_IWhi="$ESeq"'0;107m';
# https://gist.github.com/tavinus/925c7c9e67b5ba20ae38637fd0e06b07


stderr() {
	printf "%s\n" "$@" 1>&2
}

if [ ! -e ".env" ]; then
	stderr "Missing env file!"
	stderr "Run develmode.sh script"
	stderr "To auto generate .env file"
	exit 1
fi



waitOnStart() {
	timeout 5m sh -c "until curl -s 'http://127.0.0.1:$PORT' -o /dev/null; do sleep 0.5; done"
	test "$?" -ne 1 || exit 1
	local MSG="$(cat <<-EOF
	/**********************************************************/
	/*                                                        */
	/*                                                        */
	/*                 Go to your browser at:                 */
	/*                 ${BGre}http://127.0.0.1:${PORT}${RCol}                  */
	/*                  Use ${Red}Ctrl+C${RCol} to exit                    */
	/*                                                        */
	/*                                                        */
	/**********************************************************/
	EOF
	)"

	stderr "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" "" ""
	echo -e "$MSG" 1>&2
	stderr ""
}
composer install

php artisan migrate
waitOnStart &
php artisan serve --host 0.0.0.0 --port "$PORT"
