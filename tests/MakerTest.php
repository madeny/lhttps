<?php 
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\Domain;
use Madeny\lhttps\Path;
use Madeny\lhttps\Maker;
use Symfony\Component\Dotenv\Dotenv;

class MakerTest extends TestCase
{
	public function setUp()
	{
		$this->path = Path::all();

		$this->domain = new domain; 
		$this->domain->setDomainOne('madeny.com');
	}

	   /** @test */
	public function a_user_can_generate_root_certificate_key()
	    {
	    	$rootkey = file_exists($this->path.'/keys/root.key');

	    	if ($rootkey) {
	    		echo "\n You already have a Root Key I'm using that! \n";
	    	}else{
	    		$keygen = Maker::keygen($this->path);

	    		if ($keygen->getError() == 0) {
	    			echo "\n Key created with success \n";
	    		}else{
	    			echo "Something not right";
	    		}

	    		$rootkey = true;
	    	}

	    	$this->assertEquals($rootkey, true);
		}

		/** @test */
	public function a_user_can_create_root_certificate_authority()
	{
		
		if (file_exists($this->path.'/csr/root.pem')) {
			echo "\n You already have a Root Certificate we can use that!";
		}else{ 
		 $ca = Maker::create($this->path);

		 if ($ca->getError() == 0) {
			echo "\n Certificate create success \n";
		}else{
			echo "\n Sorry something is wrong \n";
		}
		}

		$rootCA = file_exists($this->path.'/csr/root.pem');

		$this->assertEquals($rootCA, true);
	}

	   /** @test */
	public function a_user_can_create_certificate_key_for_domain()
	    {
	    	$domainkey = file_exists($this->path.'/live/'.$this->domain->getDomainOne().'.ssl.key');
	    	$domaincsr = file_exists($this->path.'/csr/'.$this->domain->getDomainOne().'.csr');

	    	if ($domainkey) {
	    		echo "\n You already have a key for this domain we can sign this \n";
	    	}else{ 
	    		Maker::domain($this->path, $this->domain->getDomainOne(), $this->domain->getDomainTwo());

	    		$domainkey = true;
	    		$domaincsr = true;
	    	}	    	

	    	$this->assertEquals($domainkey, true);
	    	$this->assertEquals($domaincsr, true);
		}


		   /** @test */
	public function a_user_can_sign_a_domain_cert_with_root_certificate_authority()
		    {
		    	$request = Maker::request($this->path, $this->domain->getDomainOne());

		    	$process = file_get_contents(realpath($this->path.'/csr/process'));

		    	// die(var_dump(exec("cat {$process}")));
		    	if (strpos($process, "values mismatch") == true){
		    		
		    		echo "\n Please delete your your CA and CAkey and make new one \n";

		    		$request->setError(0);
		    	}

		    	$this->assertEquals($request->getError(), 0);


			}

	   /** @test */
	public function a_user_can_Trust_the_root_SSL_certificate()
	    {
	    	$os = exec("uname -a");

	    	$trusted = Maker::trust($this->path, $os, $option = null);

	    	$this->assertEquals($trusted->getError(), 2);
		}


		
}