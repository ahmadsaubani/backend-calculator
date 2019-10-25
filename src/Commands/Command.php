<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends BaseCommand
{
    private function result($getInput, $finalResult)
    {
        return $getInput." = ".$finalResult;
    }

    protected function add(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $array = $inputInterface->getArgument('numbers');
        $finalResult = 0;

        foreach ($array as $key => $arg) {
            $finalResult += $arg;
            if ($key == 0) {
                $getInput = ''.$array[$key].'';
            } else {
                $getInput .= " + {$arg}";
            }
        }

        $getOutput = $getInput;
        $getOutput .= " = {$finalResult}";

        $outputInterface->writeln($this->result($getInput, $finalResult));
    }

    protected function subtract(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $array = $inputInterface->getArgument('numbers');

        $finalResult = $array[0];

        foreach ($array as $key => $arg) {
            if ($key == 0) {
                $getInput = "{$arg}";
            } else {
                $finalResult -= $arg;
                $getInput .= " - {$arg}";
            }
        }
        
        $getOutput = $getInput;
        $getOutput .= " = {$finalResult}";

        $outputInterface->writeln($this->result($getInput, $finalResult));
    }

    protected function multiply(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $array = $inputInterface->getArgument('numbers');

        $finalResult = $array[0];
        
        foreach ($array as $key => $arg) {
            if ($key == 0) {
                $getInput = "{$arg}";
            } else {
                $finalResult *= $arg;
                $getInput .= " * {$arg}";
            }
        }

        $getOutput = $getInput;
        $getOutput .= " = {$finalResult}";

        $outputInterface->writeln($this->result($getInput, $finalResult));
    }
}
