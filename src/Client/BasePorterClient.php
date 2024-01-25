<?php

namespace Hyperzod\PorterSdkPhp\Client;

use Exception;
use GuzzleHttp\Client;
use Hyperzod\PorterSdkPhp\Exception\InvalidArgumentException;

class BasePorterClient implements PorterClientInterface
{

   /** @var array<string, mixed> */
   private $config;

   /**
    * Initializes a new instance of the {@link BasePorterClient} class.
    *
    * The constructor takes two arguments.
    * @param string $api_key the API Key for Porter's API
    * @param string $api_base the base URL for Porter's API
    */

   public function __construct($api_key, $api_base)
   {
      $config = $this->validateConfig(array(
         "api_key" => $api_key,
         "api_base" => $api_base
      ));

      $this->config = $config;
   }

   /**
    * Gets the Api Key used by the client to send requests.
    *
    * @return null|string the Api Key used by the client to send requests
    */
   public function getApiKey()
   {
      return $this->config['api_key'];
   }

   /**
    * Gets the base URL for Porter's API.
    *
    * @return string the base URL for Porter's API
    */
   public function getApiBase()
   {
      return $this->config['api_base'];
   }

   /**
    * Sends a request to Porter's API.
    *
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */

   public function request($method, $path, $params)
   {
      try {
         $client = new Client([
            'headers' => [
               'accept' => 'application/json',
               'content-type' => 'application/json',
               'X-API-KEY' => $this->getApiKey()
            ]
         ]);

         $api = $this->getApiBase() . $path;

         $response = $client->request($method, $api, [
            'http_errors' => true,
            'body' => json_encode($params)
         ]);

         return $this->validateResponse($response);
      } catch (\GuzzleHttp\Exception\RequestException $e) {
         // Handle exceptions, e.g., print the error message
         echo $e->getResponse()->getBody()->getContents();
      }
   }

   /**
    * @param array<string, mixed> $config
    *
    * @throws InvalidArgumentException
    */
   private function validateConfig($config)
   {
      // api_key
      if (!isset($config['api_key'])) {
         throw new InvalidArgumentException('api_key field is required');
      }

      if (!is_string($config['api_key'])) {
         throw new InvalidArgumentException('api_key must be a string');
      }

      if ($config['api_key'] === '') {
         throw new InvalidArgumentException('api_key cannot be an empty string');
      }

      if (preg_match('/\s/', $config['api_key'])) {
         throw new InvalidArgumentException('api_key cannot contain whitespace');
      }

      if (!isset($config['api_base'])) {
         throw new InvalidArgumentException('api_base field is required');
      }

      if (!is_string($config['api_base'])) {
         throw new InvalidArgumentException('api_base must be a string');
      }

      if ($config['api_base'] === '') {
         throw new InvalidArgumentException('api_base cannot be an empty string');
      }

      return [
         "api_key" => $config['api_key'],
         "api_base" => $config['api_base'],
      ];
   }

   private function validateResponse($response)
   {
      $status_code = $response->getStatusCode();

      if ($status_code >= 200 && $status_code < 300) {
         $response = json_decode($response->getBody(), true);
         return $response;
      } else {
         $response = json_decode($response->getBody(), true);
         if (isset($response["errors"])) {
            throw new Exception($response["errors"][0]["message"]);
         }
         throw new Exception("Errors node not set in server response");
      }
   }
}
