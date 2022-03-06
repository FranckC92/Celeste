<?php

namespace Snippets;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

use Symfony\Component\HttpFoundation\File\File;
use function Symfony\Component\String\u;


$ipsumFile    = new File(__DIR__ . '/ipsum.txt');
$ipsumContent = u( $ipsumFile->getContent() )->split('.');
$ipsumResult  = [];

foreach ( $ipsumContent as $key => $value ) {

    $line = $value->trim()->toString();
    if ( !empty($line) ) {

        array_push($ipsumResult, $line);
    }
}

sort($ipsumResult);
$ipsumCount = sizeof($ipsumResult);

for ($i = 0; $i < $ipsumCount; $i++) {
    echo $ipsumResult[ random_int(0, $ipsumCount-1) ] . PHP_EOL;
}

die(0);
