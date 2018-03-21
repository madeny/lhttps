<?php  

namespace Madeny\lhttps;

class CertificateSigningRequest{
	protected  $error;
	protected  $output;

	function __construct($path, $domain)
	{
		exec("openssl x509 -req -in {$path}/csr/{$domain}.csr -CA {$path}/csr/root.pem -CAkey {$path}/keys/root.key -CAcreateserial  -out {$path}/live/{$domain}.ssl.crt -days 500 -sha256 -extfile {$path}/cnf/v3.ext -passin pass:none 2>{$path}/csr/process", $output, $error);

		// 2>/dev/null
		$this->error = $error;

		$this->output = $output;
	}

	public function getError()
	{
		return $this->error;
	}

	public function setError($error)
	{
		$this->error = $error;
	}
}

