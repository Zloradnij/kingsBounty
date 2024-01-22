<?php

namespace App\Entity;


abstract class WorldEntity
{
    public function setParameters($params)
    {
        foreach ($params as $paramName => $value) {
            if (!property_exists($this, $paramName)) {
                return $this;
            }

            $methodName = explode('_', $paramName);

            $methodName = array_map(function ($value) {
                    return ucwords($value);
                }, $methodName);

            $methodName = "set" . implode('', $methodName);

            $this->$methodName($value);
        }

        return $this;
    }
}
