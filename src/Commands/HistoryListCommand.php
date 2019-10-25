<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Jakmall\Recruitment\Calculator\Commands\Command;

class HistoryListCommand extends Command
{
    public function configure()
    {
        $this->setName('history:list')
            ->setDescription('Show calculator history')
            ->setHelp('This command allows you view calculator history')
            ->addArgument('commands', InputArgument::IS_ARRAY, 'Filter the history by commands');
    }

    public function execute(InputInterface $getInput, OutputInterface $getOutput)
    {
        $this->listHistory($getInput, $getOutput);
    }
}
