<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\File;

use function Symfony\Component\String\u;

class LoremGenerator
{
    private array $files;

    public function __construct()
    {
        $this->files = [
            'xs' => ( new File( __DIR__ . '/../../snippets/ipsum-xs.txt' ) )->getContent(),
            'sm' => ( new File( __DIR__ . '/../../snippets/ipsum-sm.txt' ) )->getContent(),
            'md' => ( new File( __DIR__ . '/../../snippets/ipsum-md.txt' ) )->getContent(),
            'lg' => ( new File( __DIR__ . '/../../snippets/ipsum-lg.txt' ) )->getContent(),
        ];
    }

    public function generate(string $type = 'md'): string
    {
        $contents = u( $this->files[ $type ] )->split( PHP_EOL );
        return $contents[ random_int(0 , (sizeof( array_keys( $contents ) ) - 1) ) ]->toString();
    }
}
