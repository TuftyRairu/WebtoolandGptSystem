<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;


class PaymentService
{
    use ConsumesExternalService;


    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config("services.payment.base_uri");
        $this->secret = config("services.payment.secret");

    }

    public function pay($data){
        return $this->performRequest("POST", '/api/payment', $data);
    }

}