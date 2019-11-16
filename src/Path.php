<?php 

namespace Madeny\lhttps;

class Path{


// need refactory.
	public static function all()
	{
		$path = realpath(__DIR__.'/../cert');
		return $path;
	}

}