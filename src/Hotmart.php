<?php

namespace Wesleydeveloper\Hotmart;

use GuzzleHttp\Client;
use Wesleydeveloper\Hotmart\Support\HotConnect;

/**
 * Class Hotmart
 * @package Wesleydeveloper\Hotmart
 */
class Hotmart extends HotConnect
{

    private const BASE_URI = 'https://api-hot-connect.hotmart.com/';

    private $client;

    private $params;
    public function __construct()
    {
        parent::__construct();
        $this->params = ['headers' => $this->getAccessToken()];
        $this->client = new Client(['base_uri' => self::BASE_URI]);
    }

    public function getHistory()
    {
        $request = $this->client->get('/reports/rest/v2/history', $this->params);
        $response = json_decode($request->getBody()->getContents(), true);
        return $response;
    }

    public function getHotlinks()
    {
        $request = $this->client->get('/reports/rest/v2/history', $this->params);
        $response = json_decode($request->getBody()->getContents(), true);
        return $response;
    }

}
