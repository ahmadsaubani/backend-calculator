#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Jakmall\Recruitment\Calculator\Commands\AddCommand;
use Jakmall\Recruitment\Calculator\Commands\SubtractCommand;
use Jakmall\Recruitment\Calculator\Commands\MultiplyCommand;
use Jakmall\Recruitment\Calculator\Commands\DivideCommand;
use Jakmall\Recruitment\Calculator\Commands\PowCommand;
use Jakmall\Recruitment\Calculator\Commands\HistoryListCommand;
use Jakmall\Recruitment\Calculator\Commands\HistoryDeleteCommand;

require_once __DIR__.'/vendor/autoload.php';

$app = new Application('Calculator', '0.6');

$app->add(new AddCommand());
$app->add(new SubtractCommand());
$app->add(new MultiplyCommand());
$app->add(new DivideCommand());
$app->add(new PowCommand());
$app->add(new HistoryListCommand());
$app->add(new HistoryDeleteCommand());

$app->run();
