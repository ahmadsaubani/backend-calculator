<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Jakmall\Recruitment\Calculator\Commands\Command;

class SubtractCommand extends Command
{
    public function configure()
    {
        $this->setName('subtract')
            ->setDescription('Subtract all given Numbers')
            ->setHelp('This command allows you to subtract some numbers')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The numbers to be subtracted');
    }

    public function execute(InputInterface $getInput, OutputInterface $getOutput)
    {
        $this->subtract($getInput, $getOutput);
    }
}
