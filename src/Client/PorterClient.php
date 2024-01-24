<?php

namespace Hyperzod\PorterSdkPhp\Client;

use Hyperzod\PorterSdkPhp\Service\CoreServiceFactory;

class PorterClient extends BasePorterClient
{
    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}
