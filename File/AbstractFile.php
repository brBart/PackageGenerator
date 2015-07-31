<?php

namespace WsdlToPhp\PackageGenerator\File;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PhpGenerator\Component\PhpFile;

abstract class AbstractFile implements FileInterface
{
    /**
     * @var Generator
     */
    protected $generator;
    /**
     * @var PhpFile
     */
    protected $file;
    /**
     * @param Generator $generator
     * @param string $name
     */
    public function __construct(Generator $generator, $name)
    {
        $this
            ->setFile(new PhpFile($name))
            ->setGenerator($generator);
    }
    /**
     * @param Generator $generator
     * @return AbstractFile
     */
    public function setGenerator(Generator $generator)
    {
        $this->generator = $generator;
        return $this;
    }
    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->generator;
    }
    /**
     * @return int|bool
     */
    public function write()
    {
        return $this->writeFile();
    }
    /**
     * @return int|bool
     */
    protected function writeFile()
    {
        return file_put_contents($this->getFileName(), $this->getFile()->toString(), LOCK_EX);
    }
    /**
     * @return string
     */
    public function getFileName()
    {
        return sprintf('%s%s.php', $this->getGenerator()->getOptionDestination(), $this->getFile()->getMainElement()->getName());
    }
    /**
     * @param PhpFile $file
     * @return AbstractFile
     */
    protected function setFile($file)
    {
        $this->file = $file;
        return $this;
    }
    /**
     * @return PhpFile
     */
    public function getFile()
    {
        return $this->file;
    }
}
