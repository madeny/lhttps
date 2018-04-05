<?php 
namespace Madeny\lhttps;

use Madeny\lhttps\Openssl;

class Config{

public static function file($path, $domainOne, $domainTwo)
{
	return new Openssl($path, $domainOne, $domainTwo);
}
}
