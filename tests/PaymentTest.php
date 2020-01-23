<?php

namespace Promega\IParaPos\Tests;

use Promega\IParaPos\IParaPos;
use Promega\IParaPos\Request\InitializeThreeDRequest;
use Promega\IParaPos\Response\InitializeThreeDResponse;

final class PaymentTest extends BaseTestCase
{
    public function testInitialize()
    {
        $request = $this->makeInitialization();
        /** @var InitializeThreeDResponse $response */
        $response = IParaPos::make(static::$settings)->run($request);
        $this->assertInstanceOf(InitializeThreeDResponse::class, $response);
    }

    protected function makeInitialization()
    {
        $request = InitializeThreeDRequest::make();
        $request->order_id = "123";
        $request->echo = "echo";
        $request->mode = "T";
        $request->amount = "10000"; // 100.00 TL
        $request->card_owner_name = "Orkun CAKILKAYA";
        $request->card_number = "4282209004348015";
        $request->card_month = "05";
        $request->card_year = "23";
        $request->card_cvc = "000";
        $request->installment = 1;
        $request->user_id = "123";
        $request->purchaser_name = "Orkun";
        $request->purchaser_surname = "ÇAKILKAYA";
        $request->purchaser_email = "orkuncakilkaya@gmail.com";
        $request->success_url = "http://localhost/?status=success";
        $request->failure_url = "http://localhost/?status=failure";

        return $request;
    }
}