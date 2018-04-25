
![Alt text](https://raw.githubusercontent.com/madeny/lhttps/master/lhttps.svg?sanitize=true)
* Create a Certifcate Authority that can be use to issue certificate for domains.

[![Build Status](https://travis-ci.org/madeny/lhttps.svg?branch=master)](https://travis-ci.org/madeny/lhttps)  [![CircleCI](https://circleci.com/gh/madeny/lhttps.svg?style=svg)](https://circleci.com/gh/madeny/lhttps) 
---
Sometimes you need https on your local machine to test some functionality of your application, like payment system, but some of them require a valid https. Like stripe. And you can’t use localhost to request a certificate from issuer like Let’s Encrypt, so your option is to create a self signed certificate authority (CA). This tool make it easy.

---

Just clone this repository by run this command:

```
git clone git@github.com:madeny/lhttps.git` 
from terminal and do the following:
```

* ```cd lhttps     ```
* ```composer install      ``` 
* ```php lh create domain.com     ```

If you wish to add your rootCA.pem to your Mac OS trusted certificate, use the a flag ```--a``` right after domain.com like so: ```php lh create domain.com --a```

Your ```domain.com.ssl.key``` and ```domain.com.ssl.crt``` will be in ```cert/live``` directory

Just update your nginx config with       
```
ssl_certificate path/to/domain.com.ssl.crt;
ssl_certificate_key path/to/domain.com.ssl.key;
```


*Right now only OSX and Ubuntu are support to create Certificate*
*But only Mac OSX are support to automatically add your Root Certificate Authority (CA) to the Trusted list*

### Todo Next:

- [ ] Full support for ubuntu
- [ ] Support for Windows
- [ ] Auto deploy certificate for Nginx
- [ ] Auto deploy certificate for Apache
- [ ] Auto deploy certificate for Node.js
