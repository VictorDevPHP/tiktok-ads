<?php

namespace TikTokAds\Auth;

use TikTokAds\Client;

class AuthManager extends Client
{
    private $appId;
    private $secret;

    public function __construct(string $appId, string $secret)
    {
        parent::__construct();
        $this->appId = $appId;
        $this->secret = $secret;
    }

    public function authenticate(string $authCode): array
    {
        $path = '/open_api/v1.3/oauth2/access_token/';
        $data = [
            'app_id' => $this->appId,
            'secret' => $this->secret,
            'auth_code' => $authCode,
        ];
    
        try {
            $response = $this->post($path, $data);
    
            if (!isset($response['data'])) {
                throw new \Exception("Erro na autenticação: Resposta inesperada da API: " . json_encode($response));
            }
    
            return $response['data'];
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            throw new \Exception("Erro ao se comunicar com a API: " . $e->getMessage(), $e->getCode(), $e);
        } catch (\Exception $e) {
            throw new \Exception("Erro durante a autenticação: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    
}
