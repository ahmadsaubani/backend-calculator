#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Jakmall\Recruitment\Calculator\Commands\AddCommand;
use Jakmall\Recruitment\Calculator\Commands\SubtractCommand;

require_once __DIR__.'/vendor/autoload.php';

$app = new Application('Calculator', '0.2');

$app->add(new AddCommand());
$app->add(new SubtractCommand());

$app->run();
