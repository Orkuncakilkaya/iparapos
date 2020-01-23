<?php

namespace Promega\IParaPos\Request;

use GuzzleHttp\RequestOptions;
use Promega\IParaPos\Response\BINResponse;
use Promega\IParaPos\Settings;

class BINRequest extends BaseRequest
{
    /** @var string */
    public $bin_number = null;

    protected function hashString(): string
    {
        return $this->bin_number;
    }

    public function apiUrl(Settings $settings): string
    {
        return $settings->getBaseApiUrl() . '/payment/bin/lookup';
    }

    /**
     * @return string
     */
    public function getBinNumber()
    {
        return $this->bin_number;
    }

    /**
     * @param string $bin_number
     * @return BINRequest
     */
    public function setBinNumber($bin_number)
    {
        $this->bin_number = $bin_number;

        return $this;
    }

    public function getBody()
    {
        return ['binNumber' => $this->bin_number];
    }

    public function responseClass(): string
    {
        return BINResponse::class;
    }

    public static function getContentType()
    {
        return "application/json; charset=UTF8";
    }

    public static function getRequestType()
    {
        return RequestOptions::JSON;
    }
}
