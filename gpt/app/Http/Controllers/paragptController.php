<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Traits\ApiResponser; //Standard API response
use Illuminate\Http\Response;
use App\Traits\ConsumesExternalService; //Standard API response


Class paragptController extends Controller {
    use ApiResponser;
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = "https://api.openai.com";
    }
    public function chat(Request $request)
    {
        $API_KEY = config('services.api_key.key');

        $headers = [
            "Authorization" => "Bearer"." ".$API_KEY,
            "content-type" => "application/json",
        ];

        $message = [
            "role" => "user",
            "content" => request('messages'),
        ];

        $data = [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                $message
            ],
        ];

        $validation = [
            "messages" => "required | string",
        ];

        $this->validate($request, $validation);

        $urlRequest = $this->performRequest("POST", "/v1/chat/completions",  json_encode($data), $headers);

        $response = [
            "messages" => json_decode($urlRequest)->choices[0]->message->content
        ];

        return $this->successResponse($response);
    }

}


