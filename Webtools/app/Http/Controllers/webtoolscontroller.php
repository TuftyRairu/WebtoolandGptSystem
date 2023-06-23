<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Traits\ApiResponser; //Standard API response
use Illuminate\Http\Response;
use App\Traits\ConsumesExternalService; //Standard API response


Class WebToolsController extends Controller {
    use ApiResponser;
    use ConsumesExternalService;

    public function urldecode(Request $request)
    {
        $response = [
            "decoded-url" => rawurldecode(request('url')),
        ];

        if(request('url')){
            return $this->successResponse($response);
        } else {
            return $this->errorResponse('not a url', 404);
        }
    }

    public function urlencode(Request $request)
    {
        $url = $request->input('url');
        $response = [
            "encoded-url" => rawurlencode($url),
        ];

        if($url){
            return $this->successResponse($response);
        } else if(!$url){
            return $this->errorResponse('not a url', 404);
        } else {
            return $this->errorResponse('empty', 404);
        }
    }

    public function basedecode(Request $request)
    {
        $response = [
            "decoded-base64" => base64_decode(request('base64')),
        ];

        if(request('base64')){
            return $this->successResponse($response);
        } else {
            return $this->errorResponse('not a base64 encoded string', 404);
        }
    }

    public function baseencode(Request $request)
    {
        $response = [
            "encoded-base64" => base64_encode(request('text')),
        ];

        if(request('text')){
            return $this->successResponse($response);
        } else {
            return $this->errorResponse('not a string to be encoded to base64', 404);
        }
    }

    public function linkgenerator(Request $request)
    {

        $color = request('color');
        $bcolor = request('background-color');
        $tdecoration = request('text-decoration');
        $tnew = request('target-new');
        $link = request('link');
        $ltext = request('link-text');

        $html = "<!DOCTYPE HTML>\n"
        . "<html lang=\"en\">\n"
        . "<head>\n"
        . "<style>\n"
        . "a:link, a:visited {\n"
        . "color: " . $color . ";\n"
        . "background-color: " . $bcolor . ";\n"
        . "text-decoration: " . $tdecoration . ";\n"
        . "target-new: " . $tnew . ";\n"
        . "}\n"
        . "</style>\n"
        . "</head>\n"
        . "<body>\n"
        . "<a href=\"" . $link . "\">" . $ltext . "</a>\n"
        . "</body>\n"
        . "</html>";

        $response = [
            "html-link" => $html,
        ];

        if(request('link')){
            return $this->successResponse($response);
        } else {
            return $this->errorResponse('not a link for html directing', 404);
        }
    }
}


