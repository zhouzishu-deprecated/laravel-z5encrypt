<?php

namespace Zhouzishu\LaravelZ5Encrypt;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Zhouzishu\LaravelZ5Encrypt\Exceptions\Z5EncryptException;

class Z5Encrypt
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function encryptFile($file, $fileName, $configuration = [])
    {
        $url = 'https://open.api.z5encrypt.com/release/public/v'.
            $this->config['api_version'].
            '/encrypt';
        $token = $this->getToken($file, $fileName, $configuration);

        $http_client = new Client();

        $response = $http_client->post($url, [
            'headers' => [
                'token' => $this->config['token'],
            ],

            'body' => $token,
        ])->getBody();

        $ret = json_decode($response);

        if ($ret->err === 0) {
            return $ret;
        } else {
            throw new Z5EncryptException($ret->message);
        }
    }

    public function getToken($file, $fileName, $configuration = [])
    {
        $payload = [
            'file'          => base64_encode($file),
            'fileName'      => $fileName,
            'configuration' => $configuration,
        ];

        return (string) JWT::encode($payload, $this->config['secret']);
    }
}
