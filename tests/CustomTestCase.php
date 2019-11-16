<?php  declare(strict_types=1);
namespace Madeny\lhttps\Test;
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\DomainProvider;
use Madeny\lhttps\Path;
use Madeny\lhttps\Config;
use Madeny\lhttps\Factory;
use Symfony\Component\Dotenv\Dotenv;

class CustomTestCase extends TestCase {

	public static function setUpBeforeClass()
    {
        (new Config);
    }

    public function setUp()
	{
		$this->path = Path::all();

		$this->domain = new DomainProvider; 

		$this->domain->setdomain('example.com');
		
		Config::file($this->path, $this->domain->getdomain());
		$this->factory = new Factory();
	}

	public function tearDown()
	{
		unset($this->path, $this->domain);
	}
}