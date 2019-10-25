#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Jakmall\Recruitment\Calculator\Commands\AddCommand;

require_once __DIR__.'/vendor/autoload.php';

$app = new Application('Calculator', '0.1');

$app->add(new AddCommand());

$app->run();
