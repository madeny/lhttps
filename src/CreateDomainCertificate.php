<?php 

namespace Madeny\lhttps;

class CreateDomainCertificate{
	protected  $error;

	protected  $output;

	function __construct($path, $domainOne)
	{
		exec("openssl req -new -sha256 -nodes -out {$path}/csr/{$domainOne}.csr -newkey rsa:2048 -keyout {$path}/live/{$domainOne}.ssl.key -config {$path}/cnf/openssl.cnf 2>{$path}/logs/log", $output, $error);

		// $this->error = $error;
		// die(var_dump($this->error = $error));
		$this->output = $output;
	}

	public function getError()
	{
		return $this->error;
	}
}

