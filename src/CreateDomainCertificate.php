<?php 

namespace Madeny\lhttps;

class CreateDomainCertificate{
	protected  $error;

	protected  $output;

	function __construct($path, $domain)
	{
		exec("openssl req -new -sha256 -nodes -out {$path}/csr/{$domain}.csr -newkey rsa:2048 -keyout {$path}/live/{$domain}.ssl.key -config {$path}/cnf/openssl.cnf 2>>{$path}/logs/log", $output, $error);

		$this->error = $error;
		
		$this->output = $output;
	}

	public function getError()
	{
		return $this->error;
	}

	public function getOutput()
	{
		return $this->output;
	}
}

