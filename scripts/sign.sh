#!/usr/bin/env bash
FILEPATH=$1

sign() {
	DOMAINNAME=$2
	# Certificate sign request
	openssl x509 -req -in $FILEPATH/csr/$DOMAINNAME.csr -CA $FILEPATH/csr/root.pem -CAkey $FILEPATH/keys/root.key -CAcreateserial  -out $FILEPATH/live/$DOMAINNAME.ssl.crt -days 500 -sha256 -extfile $FILEPATH/cnf/v3.ext -passin pass:none 2>>$FILEPATH/logs/log.sign
}

sign $1 $2