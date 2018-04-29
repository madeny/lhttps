<?php 
namespace  Madeny\lhttps;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use Madeny\lhttps\Config;
use Madeny\lhttps\Maker;
use Madeny\lhttps\Path;
use Madeny\lhttps\DomainProvider;

class CreatorCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('create')
        ->addArgument("domainName", InputArgument::OPTIONAL, 'Add a custom domain name defualt domain is localhost')
        ->setDescription('Creates a new certificate.')
        ->setHelp('This command allows you to create a root certificate...');

        $this
    ->addOption(
        'a',
        null,
        InputOption::VALUE_NONE,
        'This will add your root certificate on your OS  trusted list?'
    );


    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {


        // Instantiating dependencies
        $path = Path::all();

        $domain = new DomainProvider();

        $domainName = $input->getArgument('domainName');

        $domain->setDomainOne($domainName);

        Config::file($path, $domain->getDomainOne(), $domain->getDomainTwo());

        // generate a root certificate key.
        Maker::keygen($path);

        // Create a root certificate authority.
        Maker::create($path);

        // Create cert key for a domain.
        Maker::domain($path, $domain->getDomainOne(), $domain->getDomainTwo());

        
        // Request a certificate sign from root certificate authority.
        Maker::request($path, $domainName);

        $checker = exec("uname -a");

        $option = $input->getOption('a');

       if (!$option == true) {
           exit();
       }else{
        $trust = Maker::trust($path, $checker, $option);
       }

       // Disply error messages.
       if ( $trust->getError() == 2) {
           $output->writeln('<error>Sorry this host not support!</error>');
       }elseif ($trust->getError() == 1) {
            $output->writeln('<info>Fail to add your certificate to trust list you can do it manually</info>');
       }elseif ($trust->getError() == 0) {
           $output->writeln('<info>Your certificate is added to your trust list</info>');
       }

    }
}
