#!/usr/bin/env bash
FILEPATH=$1

trust() {
	sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain $FILEPATH/csr/root.pem 2>> $FILEPATH/logs/log.trust
}

trust $1
