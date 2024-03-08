<?php

namespace App\Helpers\HttpHelper;

use Illuminate\Support\Facades\Http;

class Response
{
    private string $domain;

    public function __construct()
    {
        $this->domain = env('API_DOMAIN', 'http://localhost:8082');
    }

    public function responseData($endpoint)
    {
        $response = Http::get($this->domain . $endpoint);
        if ($response->status() !== 200) {
            return null;
        }
        return $response->json();
    }
}
