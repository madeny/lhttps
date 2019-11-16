<?php 
namespace Madeny\lhttps;
use Symfony\Component\Dotenv\Dotenv;
class Openssl
{

	public function __construct($path, $domain)
	{
	
	$v3 = [
			'authorityKeyIdentifier=keyid,issuer',
			'basicConstraints=CA:FALSE',
			'keyUsage = digitalSignature, nonRepudiation, keyEncipherment, dataEncipherment',
			'subjectAltName = @alt_names',
			"[alt_names]",
			"DNS.1 = {$domain}"
		];

		$str = implode("\n", $v3);
		file_put_contents($path.'/cnf/v3.ext', $str);

		$dotenv = new Dotenv();
		$dotenv->load(realpath(__DIR__.'/../.env'));

		$arr = [
		getenv('R'),
		getenv('D'),
		getenv('P'),
		getenv('DM'),
		getenv('DN'),
		getenv('D2'),
		getenv('COUNTRY'),
		getenv('STATE'),
		getenv('LOCALITY'),
		getenv('ORGANIZATION'),
		getenv('ORGANIZATION_UNIT'),
		getenv('EMAILADDRESS'),
		getenv('COMMONNAME')];

		$str = implode("\n", $arr);
		file_put_contents($path.'/cnf/openssl.cnf', $str);

	}
	
}


