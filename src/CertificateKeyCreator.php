<?php  
namespace Madeny\lhttps;

class CertificateKeyCreator{

	public  $output;
	public  $errors;

	public function __construct($path)
	{
		exec(
		"openssl genrsa -des3 -passout pass:none   -out {$path}/keys/root.key  2048 2>>{$path}/logs/log", $output, $errors);
		$this->errors = $errors;
		$this->output = $output;
	}
}