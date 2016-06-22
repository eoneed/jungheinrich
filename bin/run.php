<?php
require __DIR__.'/../app.php';

use \Symfony\Component\Console\Application;

$application = new Application('ISM Entity', '1.0');
$application->add(new \Ism\Process\Lister());
$application->add(new \Ism\Process\Register());
$application->run();
