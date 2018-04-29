<?php 
namespace Madeny\lhttps;

use Madeny\lhttps\Openssl;
use Madeny\lhttps\Path;

class Config{

function __construct()
{

$folders = ["madeny", "goundo"];
for($i=0;$i<=$folders[0];$i++) 
{ 
mkdir(Path::all().folders[$i]);

die(); 
} 
}

public static function file($path, $domainOne, $domainTwo)
{
	return new Openssl($path, $domainOne, $domainTwo);
}
}
