<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Jakmall\Recruitment\Calculator\Commands\Command;

class HistoryDeleteCommand extends Command
{
    public function configure()
    {
        $this->setName('history:clear')
            ->setDescription('Clear saved history')
            ->setHelp('This command allows you clear calculator history');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->deleteHistory($output);
    }
}
