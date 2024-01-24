<?php

namespace Hyperzod\PorterSdkPhp\Enums;

class BaseEnum
{
    public function getConstants()
    {
        $reflectionClass = new \ReflectionClass($this);
        return $reflectionClass->getConstants();
    }
}
