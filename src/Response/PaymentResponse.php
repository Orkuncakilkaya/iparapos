<?php

namespace Promega\IParaPos\Response;

class PaymentResponse extends BaseResponse
{
    public $publicKey = null;
    public $echo = null;
    public $transactionDate = null;
    public $mode = null;
    public $orderId = null;
    public $amount = null;
    public $hash = null;
}