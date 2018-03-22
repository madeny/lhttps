
![Alt text](https://raw.githubusercontent.com/madeny/lhttps/master/lhttps.svg?sanitize=true)
* Make a self-signed Root Certificate Authority for local development.

[![Build Status](https://travis-ci.org/madeny/lhttps.svg?branch=master)](https://travis-ci.org/madeny/lhttps)  [![CircleCI](https://circleci.com/gh/CircleCI-Public/circleci-demo-php-laravel.svg?style=svg)](https://circleci.com/gh/madeny/Eeasycert)

<!-- https://circleci.com/gh/madeny/Eeasycert -->

* To use it just run : `php lh create domain.com`
* If you wish to add your rootCA.pem to your Mac OS trusted certificate. Use the a flag `--a` right after domain.com

Your `domain.com.ssl.key` and `domain.com.ssl.crt` will in `cert/live` directory