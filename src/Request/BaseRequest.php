<?php

namespace Promega\IParaPos\Request;

use GuzzleHttp\RequestOptions;
use Promega\IParaPos\Settings;
use SimpleXMLElement;

abstract class BaseRequest
{
    const VERSION = "1.0";
    /** @var string */
    protected $_transaction_date = null;
    protected $_token = null;

    public function __construct()
    {
        $this->_transaction_date = date("Y-m-d H:i:s");
    }

    protected abstract function hashString(): string;

    public abstract function apiUrl(Settings $settings): string;

    public abstract function responseClass(): string;

    /**
     * @return array|SimpleXMLElement
     */
    public abstract function getBody();

    public static function make()
    {
        return new static();
    }

    public static function getContentType()
    {
        return "application/xml; charset=UTF8";
    }

    public static function getRequestType()
    {
        return RequestOptions::JSON;
    }

    public function getHeaders(Settings $settings)
    {
        $is_body_xml = $this->getBody() instanceof SimpleXMLElement;

        $this->_token = $settings->getPublic() . ":" . base64_encode(sha1(
                $settings->getPrivate() . $this->hashString() . $this->_transaction_date, true
            ));

        return [
            'token' => $this->_token,
            'hashString' => $settings->getPrivate() . $this->hashString() . $this->_transaction_date,
            'transactionDate' => $this->_transaction_date,
            'version' => self::VERSION,
            'Content-Type' => static::getContentType(),
        ];
    }
}