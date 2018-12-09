<?php

namespace AppBundle\NinjaTranslator;

class NinjaTranslatorManager
{
    /**
     * @var NinjaTranslatorDiscovery
     */
    private $discovery;

    public function __construct(NinjaTranslatorDiscovery $discovery)
    {
        $this->discovery = $discovery;
    }

    /**
     * @throws \ReflectionException
     *
     * @return array
     */
    public function getNinjaTranslators(): array
    {
        return $this->discovery->getNinjaTranslators();
    }

    /**
     * @param $name
     *
     * @throws \Exception
     *
     * @return array
     */
    public function getNinjaTranslator($name): array
    {
        $ninjaTranslators = $this->discovery->getNinjaTranslators();
        if (isset($ninjaTranslators[$name])) {
            return $ninjaTranslators[$name];
        }

        throw new \Exception('NinjaTranslator not found.');
    }

    /**
     * @param $name
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function translate($name): bool
    {
        $ninjaTranslators = $this->discovery->getNinjaTranslators();

        if (array_key_exists($name, $ninjaTranslators)) {
            // TODO get fields and run translate
        }

        throw new \Exception('NinjaTranslator does not exist.');
    }
}
