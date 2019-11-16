# !/usr/bin/env bash 
# Generate the private key.
openssl genrsa -des3 -passout pass:none   -out ../../cert/keys/root.key  2048 2>> ../../cert/logs/log.key;

# Create root CA from private key.
openssl req -x509 -new -nodes -passin pass:none -key ../../cert/keys/root.key -sha256 -days 1024 -out ../../cert/csr/root.pem -config ../../cert/cnf/openssl.cnf 2>> ../../cert/logs/log.CA;

# Create domain certificate
openssl req -new -sha256 -nodes -out ../../cert/csr/byrun.csr -newkey rsa:2048 -keyout ../../cert/live/byrun.ssl.key -config ../../cert/cnf/openssl.cnf 2>> ../../cert/logs/log.domain

# Certificate sign request
openssl x509 -req -in ../../cert/csr/byrun.csr -CA ../../cert/csr/root.pem -CAkey ../../cert/keys/root.key -CAcreateserial  -out ../../cert/live/byrun.ssl.crt -days 500 -sha256 -extfile ../../cert/cnf/v3.ext -passin pass:none 2>>../../cert/logs/log.sign


