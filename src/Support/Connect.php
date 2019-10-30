<?php
/**
 * Class Connect
 * @package Wesleydeveloper\Hotmart
 * @author Wesley Silva <wesley_silva@outlook.com>
 */


namespace Wesleydeveloper\Hotmart\Support;

use GuzzleHttp\Client;
use InvalidArgumentException;

class Connect
{
    private const ENDPOINT = 'https://api-sec-vlc.hotmart.com/';
    private $config;

    public function __construct($config = null)
    {
        if(is_array($config)){
            extract($config);
            $this->setConfig($client_id, $client_secret, $basic);
        }
    }

    /**
     * @param string $client_id
     * @param string $client_secret
     * @param string $basic
     */
    public function setConfig($client_id, $client_secret, $basic)
    {
        $this->config = new Config($client_id, $client_secret, $basic);
        $this->config->setData([
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->config->getClientId(),
                'client_secret' => $this->config->getClientSecret()
            ],
            'headers' => ['Authorization' => "Basic {$this->config->getBasic()}"]
        ]);
        $this->setClient();
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    //Method: POST
    // URI: /security/oauth/token?grant_type=client_credentials&client_id=[CLIENT_ID]&client_secret=[CLIENT_SECRET]
    //Header: "Authorization" -> "[BASIC]"

    public function setClient(){
        $client = new Client([
            'base_uri' => self::ENDPOINT,
        ]);
        try {
            $request = $client->post('/security/oauth/token', $this->getConfig()->getData());
            $response = json_decode($request->getBody()->getContents(), true);
            $this->getConfig()->setAccessToken($response['access_token']);
        } catch (\Exception $e) {
            return $e;
        }
    }

}