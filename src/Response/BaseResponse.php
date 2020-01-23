<?php

namespace Promega\IParaPos\Response;

use Psr\Http\Message\ResponseInterface;

abstract class BaseResponse
{
    /** @var int */
    public $result = 0;
    /** @var string */
    public $errorMessage = null;
    /** @var string */
    public $errorCode = null;

    public static function from(ResponseInterface $response)
    {
        $body = null;
        if (strstr($response->getHeader('Content-Type')[0], 'application/json')) {
            $body = json_decode($response->getBody()->getContents(), true);
        } else if (strstr($response->getHeader('Content-Type')[0], 'application/xml')) {
            $body = json_decode(json_encode(simplexml_load_string($response->getBody()->getContents())), true);
        }
        $instance = new static();
        if ($body !== null) {
            foreach ($body as $key => $value) {
                $instance->$key = $value;
            }
        }

        return $instance;
    }
}