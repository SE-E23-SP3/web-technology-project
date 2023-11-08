#!/bin/sh



stderr() {
	printf "%s\n" "$@" 1>&2
}

if [ ! -e ".env" ]; then
	cp .env.example .env
	echo "copying to .env" >&2
fi



waitOnStart() {
	timeout 600s sh -c "until curl -sf 'http://localhost:$PORT/health' -o /dev/null; do sleep 1; done"
	test "$?" -ne 1 || exit 1
	local MSG="$(cat <<-EOF
	/**********************************************************/
	/*                                                        */
	/*                                                        */
	/*                 Go to your browser at:                 */
	/*                 http://localhost:${PORT}                  */
	/*                  Use Ctrl+C to exit                    */
	/*                                                        */
	/*                                                        */
	/**********************************************************/
	EOF
	)"

	stderr
	stderr "$MSG"
	stderr
}

composer install
php artisan serve --host 0.0.0.0 --port "$PORT"
