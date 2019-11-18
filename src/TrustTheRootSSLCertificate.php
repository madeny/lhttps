<?php 
namespace Madeny\lhttps;

class TrustTheRootSSLCertificate{
	protected  $error;

	protected  $output;

	protected  $message;

	function __construct($path)
	{
		exec(__DIR__."/../scripts/trust.sh $path", $output, $error);
		$this->error = $error; 
	}

	public function getError()
	{
		return $this->error;
	}
}