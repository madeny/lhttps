<?php  
namespace Madeny\lhttps;

class CertificateKeyCreator{

	protected  $output;
	protected  $errors;

	public function __construct($path)
	{
		exec(
		"openssl genrsa -des3 -passout pass:none   -out {$path}/keys/root.key  2048 2>>{$path}/logs/log", $output, $errors);
		$this->errors = $errors;
		$this->output = $output;
	}

	public function getError()
	{
		return $this->errors;
	}

	public function getOutput()
	{
		return $this->output;
	}
}