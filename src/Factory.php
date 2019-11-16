<?php  
namespace Madeny\lhttps;
use Madeny\lhttps\CertificateKeyCreator;
use Madeny\lhttps\CertificateAuthorityCreator;
use Madeny\lhttps\CreateDomainCertificate;
use Madeny\lhttps\CertificateSigningRequest;
use Madeny\lhttps\TrustTheRootSSLCertificate;
class Factory
{
	// Generate a RSA-2048 key and save it to a file rootCA.key. This file will be used as the key to generate the Root SSL certificate. You 
	public static function keygen($path)
	{
		return new CertificateKeyCreator($path);
	}

	// use the key you generated to create a new Root SSL certificate. Save it to a file named rootca.pem
	public static function  create($path)
	{
		return new CertificateAuthorityCreator($path);
	}


	public static function domain($path, $domain)
	{
		return new CreateDomainCertificate($path, $domain);
	}


	public static function request($path, $domain)
	{
		return new CertificateSigningRequest($path, $domain);
	}


	public static function trust($path, $OS, $option)
	{
		return new  TrustTheRootSSLCertificate($path, $OS, $option);
	}

}



