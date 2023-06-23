<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;


class WebtoolsService
{
    use ConsumesExternalService;


    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config("services.webtools.base_uri");
        $this->secret = config("services.webtools.secret");

    }

    public function urldecode($data){
        return $this->performRequest("POST", '/api/urldecode', $data);
    }

    public function urlencode($data){
        return $this->performRequest("POST", '/api/urlencode', $data);
    }

    public function basedecode($data){
        return $this->performRequest("POST", '/api/base64decode', $data);
    }

    public function baseencode($data){
        return $this->performRequest("POST", '/api/base64encode', $data);
    }

    public function linkgenerator($data){
        return $this->performRequest("POST", '/api/htmllinkgenerator', $data);
    }

}