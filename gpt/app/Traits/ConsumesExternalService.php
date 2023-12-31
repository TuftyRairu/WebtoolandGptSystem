<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

trait ConsumesExternalService
{
    public function performRequest($method, $requestUrl, $form_params, $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl, [
            'body' => $form_params,
            'headers' => $headers,
        ]);

        return $response->getBody();
    }
}
