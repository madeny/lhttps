#!/usr/bin/env bash
FILEPATH=$1
ca () {
	# Create root CA from private key.
openssl req -x509 -new -nodes -passin pass:none -key $FILEPATH/keys/root.key -sha256 -days 1024 -out $FILEPATH/csr/root.pem -config $FILEPATH/cnf/openssl.cnf 2>> $FILEPATH/logs/log.CA;
}

ca $1