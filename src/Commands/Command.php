<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class Command extends BaseCommand
{
    private function fileName()
    {
        return "logs";
    }

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

        $this->saveLog('Add', $getInput, $getOutput, $finalResult);

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

        $this->saveLog('Subtract', $getInput, $getOutput, $finalResult);

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

        $this->saveLog('Multiply', $getInput, $getOutput, $finalResult);

        $outputInterface->writeln($this->result($getInput, $finalResult));
    }

    protected function divide(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $array = $inputInterface->getArgument('numbers');

        $finalResult = $array[0];
        
        foreach ($array as $key => $arg) {
            if ($key == 0) {
                $getInput = "{$arg}";
            } else {
                $finalResult /= $arg;
                $getInput .= " / {$arg}";
            }
        }

        $getOutput = $getInput;
        $getOutput .= " = {$finalResult}";

        $this->saveLog('Divide', $getInput, $getOutput, $finalResult);

        $outputInterface->writeln($this->result($getInput, $finalResult));
    }

    protected function pow(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $finalResult = pow($inputInterface->getArgument('base'), $inputInterface->getArgument('exp'));
        $getInput = "{$inputInterface->getArgument('base')} ^ {$inputInterface->getArgument('exp')}";
        $getOutput = $getInput;
        $getOutput .= " = {$finalResult}";

        $this->saveLog('Pow', $getInput, $getOutput, $finalResult);

        $outputInterface->writeln($this->result($getInput, $finalResult));
    }

    protected function listHistory(InputInterface $inputInterface, OutputInterface $outputInterface)
    {
        $file = $this->fileName();
        if (file_exists($file)) {
            $array = explode("\n", file_get_contents($file));
            $filters = $inputInterface->getArgument('commands');
            
            $tbl = "+----+------------+---------------------------+------------+-------------------------------------+---------------------+\n";
            $tbl .= "| No | Command    | Description               | Result     | Output                              | Time                |\n";
            $tbl .= "+----+------------+---------------------------+------------+-------------------------------------+---------------------+\n";
            $k = 1;
            for ($i = 0; $i < count($array); $i++) {
                if (count($filters) != 0) {
                    for ($j = 0; $j < count($filters); $j++) {
                        if (stripos($array[$i], $filters[$j]) !== false) {
                            $rowarr = explode(",", $arr[$i]);
                            $tbl .= "| ".str_pad($k, 2)." | ".str_pad($rowarr[0], 10)." | ".str_pad($rowarr[1], 25)." | ".str_pad($rowarr[2], 10)." | ".str_pad($rowarr[3], 35)." | ".str_pad($rowarr[4], 19)." | \n";
                            $k++;
                        }
                    }
                } else {
                    $rowarr = explode(",", $array[$i]);
                    $tbl .= "| ".str_pad($k, 2)." | ".str_pad($rowarr[0], 10)." | ".str_pad($rowarr[1], 25)." | ".str_pad($rowarr[2], 10)." | ".str_pad($rowarr[3], 35)." | ".str_pad($rowarr[4], 19)." | \n";
                    $k++;
                }
            }
            $tbl .= "+----+------------+---------------------------+------------+-------------------------------------+---------------------+";

            $outputInterface->writeln($tbl);
        } else {
            $outputInterface->writeln('History is empty');
        }
    }

    public function saveLog($command, $getInput, $getOutput, $finalResult)
    {
        $fileSystem = new Filesystem();
        $file = $this->fileName();
        if (file_exists($file)) {
            $res = ''.PHP_EOL.''.$command.','.$getInput.','.$finalResult.','.$getOutput.','.date('Y-m-d H:i:s').'';
        } else {
            $res = ''.$command.','.$getInput.','.$finalResult.','.$getOutput.','.date('Y-m-d H:i:s').'';
        }
        $fileSystem->appendToFile($file, $res);
    }

    protected function deleteHistory(OutputInterface $outputInterface)
    {
        unlink($this->fileName());

        $outputInterface->writeln('History cleared!');
    }
}
