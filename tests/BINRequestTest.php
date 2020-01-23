<?php

namespace Promega\IParaPos\Tests;

use Promega\IParaPos\IParaPos;
use Promega\IParaPos\Request\BINRequest;
use Promega\IParaPos\Response\BaseResponse;
use Promega\IParaPos\Response\BINResponse;

final class BINRequestTest extends BaseTestCase
{
    public function testCanBeCreated()
    {
        $this->assertInstanceOf(BINRequest::class, BINRequest::make());
    }

    public function testRun()
    {
        $request = BINRequest::make()->setBinNumber("526911");
        /** @var BINResponse $response */
        $response = IParaPos::make(static::$settings)->run($request);
        $this->assertInstanceOf(BaseResponse::class, $response);
        $this->assertEquals($response->cardFamilyName, "CARD FINANS");
    }
}