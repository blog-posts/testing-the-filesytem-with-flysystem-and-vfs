<?php

use League\Flysystem\Filesystem;
use League\Flysystem\Vfs\VfsAdapter;
use License\Generator;
use VirtualFileSystem\FileSystem as Vfs;

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Generator
     */
    protected $generator;
    /**
     * @var Filesystem
     */
    protected $file;

    public function setUp()
    {
        $adapter = new VfsAdapter(new Vfs);
        $this->file = new Filesystem($adapter);

        $this->generator = new Generator($this->file);
    }

    /**
     * @test
     */
    public function it_creates_the_license_file()
    {
        $this->generator->make();

        $result = $this->file->get('LICENSE.txt')->exists();

        $this->assertTrue($result);
    }
}
