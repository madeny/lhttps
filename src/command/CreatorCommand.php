<?php 
namespace  Madeny\lhttps;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use Madeny\lhttps\Config;
use Madeny\lhttps\Init;

class CreatorCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('create')
        ->addArgument("domain", InputArgument::OPTIONAL, 'Add a custom domain name defualt domain is localhost')
        ->setDescription('Creates a new certificate.')
        ->setHelp('This command allows you to create a root certificate...');

        $this
    ->addOption(
        'a',
        null,
        InputOption::VALUE_NONE,
        // 'This will add your root certificate on your OS  trusted list?'
        'Config your certificate for trust policy.'
    );


    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

      $domain = $input->getArgument('domain');

      $init = new Init($domain);

      $init->execute($domain);


        // Instantiating dependencies
        // $path = Path::all();

        // (new Config);

        // $domain = new DomainProvider();

        // $domainName = $input->getArgument('domainName');

        // $domain->setdomain($domainName);

        // Config::file($path, $domain->getdomain());

        // generate a root certificate key.
        // Factory::keygen($path);

        // Create a root certificate authority.
        // Factory::create($path);

        // Create cert key for a domain.
        // Factory::domain($path, $domain->getdomain());

        
        // Request a certificate sign from root certificate authority.
       //  Factory::request($path, $domainName);

       //  $checker = exec("uname -a");

       //  $option = $input->getOption('a');

       // if (!$option == true) {
       //     exit();
       // }else{
       //  $trust = Factory::trust($path, $checker, $option);
       // }

       // Disply error messages.
       // if ( $trust->getError() == 2) {
       //     $output->writeln('<error>Sorry this host is not support!</error>');
       // }elseif ($trust->getError() == 1) {
       //      $output->writeln('<info>Fail to config your certificate for trust policy. see help for more information</info>');
       // }elseif ($trust->getError() == 0) {
       //     $output->writeln('<info>Your certificate is configured</info>');
       // }

    }
}
