<?php

namespace App\Helpers\HttpHelper;

use Illuminate\Support\Facades\Http;

class Response
{
    protected $domain;

    public function __construct()
    {
        $this->domain = env('API_DOMAIN', 'http://localhost:8082/api');
    }

    public function getData($endpoint)
    {
        $response = Http::get($this->domain.$endpoint);
        if ($response->status() !== 200) {
            return null;
        }

        return $response->json();
    }

    public function postData($endpoint, $data = [])
    {
        $response = Http::post($this->domain.$endpoint, $data);
        if ($response->status() !== 200) {
            return null;
        }

        return $response->json();
    }
}
