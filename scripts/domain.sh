#!/usr/bin/env bash
FILEPATH=$1

domain () {
	DOMAINNAME=$2
	# Create domain certificate
	openssl req -new -sha256 -nodes -out $FILEPATH/csr/$DOMAINNAME.csr -newkey rsa:2048 -keyout $FILEPATH/live/$DOMAINNAME.ssl.key -config $FILEPATH/cnf/openssl.cnf 2>> $FILEPATH/logs/log.domain
}

domain $1 $2