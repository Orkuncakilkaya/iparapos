<?php

namespace Promega\IParaPos\Response;

class InitializeThreeDResponse extends BaseResponse
{
    public $publicKey = "";
    public $echo = "";
    public $transactionDate = "";
    public $mode = "T";
    public $orderId = "";
    public $amount = "";
    public $hash = "";
    public $threeDSecureCode = "";
}