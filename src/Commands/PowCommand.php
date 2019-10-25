<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Jakmall\Recruitment\Calculator\Commands\Command;

class PowCommand extends Command
{
    public function configure()
    {
        $this->setName('pow')
            ->setDescription('Exponent the given number')
            ->setHelp('This command allows you to exponent number given')
            ->addArgument('base', InputArgument::REQUIRED, 'The base number')
            ->addArgument('exp', InputArgument::REQUIRED, 'The exponent number');
    }

    public function execute(InputInterface $getInput, OutputInterface $getOutput)
    {
        $this->pow($getInput, $getOutput);
    }
}
