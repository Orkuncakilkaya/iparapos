<?php

namespace Promega\IParaPos\Request;

use GuzzleHttp\RequestOptions;
use Promega\IParaPos\Helpers\ArrayHelper;
use Promega\IParaPos\Response\PaymentResponse;
use Promega\IParaPos\Settings;

class PaymentRequest extends BaseRequest
{
    public $mode = "T";
    public $three_d = "false";
    public $order_id = "";
    public $card_owner_name = "";
    public $card_number = "";
    public $card_month = "";
    public $card_year = "";
    public $card_cvc = "";
    public $card_id = "";
    public $user_id = "";
    public $installment = 1;
    public $amount = "100"; // For 1 TRY = "100"
    public $echo = "";
    public $vendor_id = "";
    public $purchaser = []; // name, surname, email, client_ip, birth_date, gsm_number, tc_certificate, invoice_address, shipping_address
    public $products = []; //  product_code, product_name, quantity, price

    protected function hashString(): string
    {
        return $this->order_id . $this->amount . $this->mode . $this->card_owner_name . $this->card_number
            . $this->card_month . $this->card_year . $this->card_cvc . $this->user_id . $this->card_id
            . $this->purchaser['name'] . $this->purchaser['surname'] . $this->purchaser['email'];
    }

    public function apiUrl(Settings $settings): string
    {
        return $settings->getBaseApiUrl() . '/payment/auth';
    }

    public function responseClass(): string
    {
        return PaymentResponse::class;
    }

    public static function getRequestType()
    {
        return RequestOptions::BODY;
    }

    /**
     * @inheritDoc
     */
    public function getBody()
    {
        $data = [
            'mode' => $this->mode,
            'threeD' => $this->three_d,
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
            'vendorId' => $this->vendor_id,
            'purchaser' => $this->purchaser,
            'products' => $this->products,
        ];

        return ArrayHelper::arrayToXml($data, new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><auth/>'));
    }
}