<?php

namespace TikTokAds\Report;

use TikTokAds\Client;

class ReportManager extends Client
{
    private $accessToken;

    public function __construct(string $accessToken)
    {
        parent::__construct();
        $this->accessToken = $accessToken;
    }

    public function getReport(array $params): array
    {
        if (!isset($params['dimensions']) || empty($params['dimensions'])) {
            $params['dimensions'] = ['campaign_id']; 
        }

        $path = '/open_api/v1.3/report/integrated/get/';
        $headers = [
            'Access-Token' => $this->accessToken,
        ];

        return $this->get($path, $params, $headers);
    }
}


