<?php

namespace Snippets;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

use App\Service\LoremGenerator;

$loremService = new LoremGenerator();
echo $loremService->generate('xs') . PHP_EOL;
echo $loremService->generate('sm') . PHP_EOL;
echo $loremService->generate('md') . PHP_EOL;
echo $loremService->generate('lg') . PHP_EOL;

die(0);
