<?php

namespace Hyperzod\PorterSdkPhp\Service;

use Hyperzod\PorterSdkPhp\Enums\HttpMethodEnum;

class OrderService extends AbstractService
{
   /**
    * Create a job on Porter
    *
    * @param array $params
    *
    * @throws \Hyperzod\PorterSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function create(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/orders/create', $params);
   }

   /**
    * Get a job on Porter
    *
    * @param array $params
    *
    * @throws \Hyperzod\PorterSdkPhp\Exception\ApiErrorException if the request fails
    *
    */

   public function get(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/orders/' . $params['order_id'], $params);
   }
}
