<?php
/**
 * Created by PhpStorm.
 * User: olivierpot
 * Date: 28/01/15
 * Time: 16:58
 */

namespace CCM\LocatorBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class LocatorCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setDefinition(array(
                    new InputArgument('query', InputArgument::REQUIRED,'Any string you want'))
            )
            ->setName('ccm:locator')
            ->setDescription('Gets all location by query string')
            ->setHelp(<<<EOF
The <info>%command.name%</info> gets all adresses from any locator implemented.....

To use it <comment>app/console ccm:locator rennes.</comment>
EOF
            );;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $locations = $this->getContainer()->get('ccm_locator.chained_locator')->searchByKeyword($input->getArgument('query'));


        foreach($locations as $result)
        {
            $output->writeln('<info>'.$result['name'].'</info>');
            $output->writeln('<info>'.$result['adresse'].'</info>');
            $output->writeln('<comment>'.$result['source'].'</comment>');
            $output->writeln('----------------------------------------');

        }
    }

}