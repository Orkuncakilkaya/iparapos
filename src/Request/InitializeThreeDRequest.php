<?php

namespace Promega\IParaPos\Request;

use GuzzleHttp\RequestOptions;
use Promega\IParaPos\Response\InitializeThreeDResponse;
use Promega\IParaPos\Settings;

class InitializeThreeDRequest extends BaseRequest
{
    public $mode = "T";
    public $order_id = "";
    public $card_owner_name = "";
    public $card_number = "";
    public $card_month = "";
    public $card_year = "";
    public $card_cvc = "";
    public $user_id = "";
    public $card_id = "";
    public $installment = 1;
    public $amount = "100"; // For 1 TRY = "100"
    public $echo = "";
    public $purchaser_name = "";
    public $purchaser_surname = "";
    public $purchaser_email = "";
    public $success_url = "";
    public $failure_url = "";

    protected function hashString(): string
    {
        return $this->order_id . $this->amount . $this->mode . $this->card_owner_name . $this->card_number
            . $this->card_month . $this->card_year . $this->card_cvc . $this->user_id . $this->card_id
            . $this->purchaser_name . $this->purchaser_surname . $this->purchaser_email;
    }

    public function apiUrl(Settings $settings): string
    {
        return $settings->getGateApiUrl() . "/3dgate";
    }

    public function responseClass(): string
    {
        return InitializeThreeDResponse::class;
    }

    public static function getContentType()
    {
        return "application/x-www-form-urlencoded; charset=UTF8";
    }

    public static function getRequestType()
    {
        return RequestOptions::FORM_PARAMS;
    }

    /**
     * @inheritDoc
     */
    public function getBody()
    {
        return [
            'mode' => $this->mode,
            'orderId' => $this->order_id,
            'cardOwnerName' => $this->card_owner_name,
            'cardNumber' => $this->card_number,
            'cardExpireMonth' => $this->card_month,
            'cardExpireYear' => $this->card_year,
            'cardCvc' => $this->card_cvc,
            'userId' => $this->user_id,
            'cardId' => $this->card_id,
            'installment' => $this->installment,
            'amount' => $this->amount,
            'echo' => $this->echo,
            'purchaserName' => $this->purchaser_name,
            'purchaserSurname' => $this->purchaser_surname,
            'purchaserEmail' => $this->purchaser_email,
            'successUrl' => $this->success_url,
            'failureUrl' => $this->failure_url,
            'transactionDate' => $this->_transaction_date,
            'version' => self::VERSION,
            'token' => $this->_token,
        ];
    }
}