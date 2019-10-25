<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Jakmall\Recruitment\Calculator\Commands\Command;

class AddCommand extends Command
{
    public function configure()
    {
        $this->setName('add')
            ->setDescription('Add all given Numbers')
            ->setHelp('This command allows you to add some numbers')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'numbers to be added');
    }

    public function execute(InputInterface $getInput, OutputInterface $getOutput)
    {
        $this->add($getInput, $getOutput);
    }
}
