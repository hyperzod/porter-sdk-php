<?php

namespace Hyperzod\PorterSdkPhp\Client;

/**
 * Interface for a Porter client.
 */
interface BasePorterClientInterface
{
   /**
    * Gets the Api Key used by the client to send requests.
    *
    * @return null|string the Api Key used by the client to send requests
    */
   public function getApiKey();

   /**
    * Gets the base URL for Porter's API.
    *
    * @return string the base URL for Porter's API
    */
   public function getApiBase();
}
