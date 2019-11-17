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

      $sign = $init->make($domain);

      $sign == 0 ? 

    }
}
