<?php

namespace TikTokAds\Advertiser;

use TikTokAds\Client;

class Advertiser extends Client
{
    public $accessToken;

    public function __construct(string $accessToken)
    {
        parent::__construct();
        $this->accessToken = $accessToken;
    }

    public function getInfo($params)
    {
        $path = '/open_api/v1.3/advertiser/info/';
        $headers = [
            'Access-Token' => $this->accessToken,
        ];

        return $this->get($path, $params, $headers);
    }

}