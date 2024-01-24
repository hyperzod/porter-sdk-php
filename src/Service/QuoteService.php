<?php

namespace Hyperzod\PorterSdkPhp\Service;

use Hyperzod\PorterSdkPhp\Enums\HttpMethodEnum;

class QuoteService extends AbstractService
{
   /**
    * Create a Quote on Porter
    *
    * @param array $params
    *
    * @throws \Hyperzod\PorterSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function create(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/quote', $params);
   }
}
