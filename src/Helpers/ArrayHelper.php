<?php

namespace Promega\IParaPos\Helpers;

use SimpleXMLElement;

class ArrayHelper
{
    /**
     * @param array $array
     * @param SimpleXMLElement $xml
     * @return SimpleXMLElement
     */
    public static function arrayToXml($array, $xml)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (is_int($key) && $xml->getName() === 'products') {
                    $key = "product";
                }
                static::arrayToXml($value, $xml->addChild($key));
            } else {
                $xml->addChild($key, $value);
            }
        }

        return $xml;
    }
}