<?php

namespace TikTokAds;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    protected $httpClient;
    protected $baseUrl = 'https://business-api.tiktok.com';

    public function __construct()
    {
        $this->httpClient = new GuzzleClient([
            'base_uri' => $this->baseUrl,
        ]);
    }

    public function post(string $path, array $data): array
    {
        $response = $this->httpClient->post($path, [
            'json' => $data,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function get(string $path, $query = [], array $headers = []): array
    {
        $response = $this->httpClient->get($path, [
            'query' => $query,
            'headers' => array_merge([
                'Content-Type' => 'application/json',
            ], $headers), 
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}

