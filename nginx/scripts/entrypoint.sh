#!/bin/sh

set -eux

CERTSDIR="ssl"
if [ ! -d "$CERTSDIR" ]; then
	mkdir "$CERTSDIR"
fi

echo "Creating certs"

/usr/bin/openssl req -newkey rsa:2048 -x509 -sha256 -days 2 -nodes -out "$CERTSDIR/cert.pem" -keyout "$CERTSDIR/privkey.pem" -subj "/C=../ST=.../L=... /O=.../OU=.../CN=.../emailAddress=..." --batch

/docker-entrypoint.sh nginx -g "daemon off;"
