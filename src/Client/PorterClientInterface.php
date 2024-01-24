<?php

namespace Hyperzod\PorterSdkPhp\Client;

/**
 * Interface for a Porter client.
 */
interface PorterClientInterface extends BasePorterClientInterface
{
   /**
    * Sends a request to Porter's API.
    *
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */
   public function request($method, $path, $params);
}
