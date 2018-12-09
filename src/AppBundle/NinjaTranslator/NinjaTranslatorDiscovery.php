<?php

namespace AppBundle\NinjaTranslator;

use Doctrine\Common\Annotations\Reader;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class NinjaTranslatorDiscovery
{
    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $directory;

    /**
     * @var Reader
     */
    private $annotationReader;

    /**
     * @var string
     */
    private $rootDir;

    /**
     * @var array
     */
    private $ninjaTranslators = [];

    /**
     * @param $namespace
     * @param $directory
     * @param $rootDir
     * @param Reader $annotationReader
     */
    public function __construct($namespace, $directory, $rootDir, Reader $annotationReader)
    {
        $this->namespace = $namespace;
        $this->annotationReader = $annotationReader;
        $this->directory = $directory;
        $this->rootDir = $rootDir;
    }

    /**
     * @throws \ReflectionException
     *
     * @return array
     */
    public function getNinjaTranslators(): array
    {
        if (!$this->ninjaTranslators) {
            $this->discoverNinjaTranslators();
        }

        return $this->ninjaTranslators;
    }

    /**
     * @throws \ReflectionException
     */
    private function discoverNinjaTranslators(): void
    {
        $path = $this->rootDir.'/../src/'.$this->directory;
        $finder = new Finder();
        $finder->files()->in($path);

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $class = $this->namespace.'\\'.$file->getBasename('.php');
            $annotation = $this->annotationReader->getClassAnnotation(new \ReflectionClass($class), 'AppBundle\Annotation\NinjaTranslator');

            if (!$annotation) {
                continue;
            }

            $this->ninjaTranslators[$annotation->getName()] = [
                'class' => $class,
                'annotation' => $annotation,
            ];
        }
    }
}
