#!/usr/bin/env bash

FILEPATH=$1
# Generate the private key.
openssl genrsa -des3 -passout pass:none   -out $FILEPATH/keys/root.key  2048 2>> $FILEPATH/logs/log.key;

# Create root CA from private key.
openssl req -x509 -new -nodes -passin pass:none -key $FILEPATH/keys/root.key -sha256 -days 1024 -out $FILEPATH/csr/root.pem -config $FILEPATH/cnf/openssl.cnf 2>> $FILEPATH/logs/log.CA;


sign () {
	DOMAINNAME=$2
	# Create domain certificate
	openssl req -new -sha256 -nodes -out $FILEPATH/csr/$DOMAINNAME.csr -newkey rsa:2048 -keyout $FILEPATH/live/$DOMAINNAME.ssl.key -config $FILEPATH/cnf/openssl.cnf 2>> $FILEPATH/logs/log.domain

	# Certificate sign request
openssl x509 -req -in $FILEPATH/csr/$DOMAINNAME.csr -CA $FILEPATH/csr/root.pem -CAkey $FILEPATH/keys/root.key -CAcreateserial  -out $FILEPATH/live/$DOMAINNAME.ssl.crt -days 500 -sha256 -extfile $FILEPATH/cnf/v3.ext -passin pass:none 2>>$FILEPATH/logs/log.sign
}

sign $1 $2



