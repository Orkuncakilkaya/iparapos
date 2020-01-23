<?php

namespace Promega\IParaPos\Response;

class BINResponse extends BaseResponse
{
    /** @var int */
    public $bankId = 0;
    /** @var string */
    public $bankName = null;
    /** @var string */
    public $cardFamilyName = null;
    /** @var int */
    public $supportsInstallment = 0;
    /** @var int[] */
    public $supportedInstallments = [];
    /** @var int */
    public $type = 0;
    /** @var int */
    public $serviceProvider = 0;
    /** @var int */
    public $cardThreeDSecureMandatory = 0;
    /** @var int */
    public $merchantThreeDSecureMandatory = 0;
    /** @var int */
    public $cvcMandatory = 0;
    /** @var int */
    public $businessCard = 0;
}