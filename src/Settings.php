<?php

namespace Promega\IParaPos;

class Settings
{
    /** @var string */
    protected $base_api_url = 'https://api.ipara.com/rest';
    /** @var string */
    protected $gate_api_url = 'https://www.ipara.com';
    /** @var string */
    protected $public = null;
    /** @var string */
    protected $private = null;

    public function __construct(string $public, string $private)
    {
        $this->public = $public;
        $this->private = $private;
    }

    /**
     * @return string
     */
    public function getPublic(): string
    {
        return $this->public;
    }

    /**
     * @param string $public
     */
    public function setPublic(string $public)
    {
        $this->public = $public;
    }

    /**
     * @return string
     */
    public function getPrivate(): string
    {
        return $this->private;
    }

    /**
     * @param string $private
     */
    public function setPrivate(string $private)
    {
        $this->private = $private;
    }

    /**
     * @return string
     */
    public function getBaseApiUrl(): string
    {
        return $this->base_api_url;
    }

    /**
     * @param string $base_api_url
     */
    public function setBaseApiUrl(string $base_api_url): void
    {
        $this->base_api_url = $base_api_url;
    }

    /**
     * @return string
     */
    public function getGateApiUrl(): string
    {
        return $this->gate_api_url;
    }

    /**
     * @param string $gate_api_url
     */
    public function setGateApiUrl(string $gate_api_url): void
    {
        $this->gate_api_url = $gate_api_url;
    }
}