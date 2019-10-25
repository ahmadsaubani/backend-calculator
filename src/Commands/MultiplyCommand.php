<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Jakmall\Recruitment\Calculator\Commands\Command;

class MultiplyCommand extends Command
{
    public function configure()
    {
        $this->setName('multiply')
            ->setDescription('Multiply all given Numbers')
            ->setHelp('This command allows you to multiply some numbers')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The numbers to be multiplied');
    }

    public function execute(InputInterface $getInput, OutputInterface $getOutput)
    {
        $this->multiply($getInput, $getOutput);
    }
}
