#!/usr/bin/env bash
FILEPATH=$1
# Generate the private key.
keygen () {
	openssl genrsa -des3 -passout pass:none   -out $FILEPATH/keys/root.key  2048 2>> $FILEPATH/logs/log.key;
}

keygen $1