<?php

namespace License;

use League\Flysystem\Filesystem;

class Generator
{
    /**
     * @var \League\Flysystem\Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function make()
    {
        $str = 'Copyright ' . date('Y');
        $this->filesystem->put('LICENSE.txt', $str);
    }
}
