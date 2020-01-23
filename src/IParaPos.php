<?php

namespace Promega\IParaPos;

use GuzzleHttp\Client;
use Promega\IParaPos\Request\BaseRequest;
use Promega\IParaPos\Response\BaseResponse;

class IParaPos
{
    /** @var Settings */
    protected $settings;
    /** @var BaseRequest */
    protected $request;
    /** @var BaseResponse */
    protected $response;
    /** @var Client */
    protected $client;

    protected function __construct(Settings $settings)
    {
        $this->settings = $settings;
        $this->client = new Client();
    }

    public static function make(Settings $settings)
    {
        return new static($settings);
    }

    public function run(BaseRequest $request)
    {
        $this->request = $request;
        $url = $request->apiUrl($this->settings);
        $options = [
            'headers' => $request->getHeaders($this->settings),
        ];
        $options[$request::getRequestType()] = $request->getBody();
        $response = $this->client->request('POST', $url, $options);
        $this->response = call_user_func([$request->responseClass(), "from"], $response);

        return $this->response;
    }
}