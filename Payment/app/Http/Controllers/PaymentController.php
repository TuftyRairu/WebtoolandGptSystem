<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Traits\ApiResponser; //Standard API response
use Illuminate\Http\Response;
use App\Traits\ConsumesExternalService;


Class PaymentController extends Controller {
    use ApiResponser;
    use ConsumesExternalService;
    private $baseUri;
    public function __construct()
    {
        $this->baseUri = config('services.URL.payment');
    }

    public function pay(Request $request){
        $API_KEY = base64_encode(config('services.KEY.key'));
        $headers = [
            "Authorization" => "Basic"." ".$API_KEY,
            "content-type" => "application/json"
        ];

        $email = request('email');

        $data = '{"data":{"attributes":{"billing":{"email":"'.$email.'"},"line_items":[{"currency":"PHP","amount":10000,"description":"PAYMENT","name":"GPT SUBSCRIPTION","quantity":1}],"payment_method_types":["gcash"],"send_email_receipt":false,"show_description":true,"show_line_items":true,"description":"'.$email.'"}}}';
        
        $validation = [
            "email" => "required | email"
        ];

        $this->validate($request, $validation);

        $urlRequest = $this->performRequest("POST", "/v1/checkout_sessions", $data, $headers);

        $response = [
            "checkout_url" => json_decode($urlRequest)->data->attributes->checkout_url
        ];

        return $this->successResponse($response);
    }

}


