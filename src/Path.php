<?php 

namespace Madeny\lhttps;

class Path{



	public static function all()
	{
		return realpath(__DIR__.'/../cert');
	}

}