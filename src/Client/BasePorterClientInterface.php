<?php

namespace Hyperzod\PorterSdkPhp\Client;

/**
 * Interface for a Porter client.
 */
interface BasePorterClientInterface
{
   /**
    * Gets the Client ID used by the client to send requests.
    *
    * @return null|string the Client ID used by the client to send requests
    */
   public function getApiKey();

   /**
    * Gets the base URL for Porter's API.
    *
    * @return string the base URL for Porter's API
    */
   public function getApiBase();

   /**
    * Get Access Token
    *
    * @return string the access token
    */
   public function getAccessToken();
}
