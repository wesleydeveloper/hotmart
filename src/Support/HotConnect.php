<?php
/*
Author: Wesley Silva
*/

namespace Wesleydeveloper\Hotmart\Support;

use GuzzleHttp\Client;
use InvalidArgumentException;

/**
 * Class HotConnect.
 */
class HotConnect
{
    private const ENDPOINT = 'https://api-sec-vlc.hotmart.com/';

    private $config;

    public function __construct()
    {
        $this->getClient();
    }

    //PROTECTED METHODS

    protected function getAccessToken()
    {
        return $this->config['tokens']['access_token']['headers'];
    }

    //PRIVATE METHODS
    private function getClient()
    {
        $client = new Client([
            'base_uri' => self::ENDPOINT,
        ]);
        $params = ['form_params' => $this->getParams(), 'headers' => $this->getBasicToken()];
        try {
            $request = $client->post('/security/oauth/token', $params);
            $response = json_decode($request->getBody()->getContents(), true);
            $this->config['tokens']['access_token']['headers'] = ['Authorization' => 'Bearer '.$response['access_token']];
        } catch (\Exception $e) {
            return $e;
        }
    }

    private function getParams(): array
    {
        $config = $this->getConfigFile();

        $keys = ['client_id', 'client_secret'];
        $params = ['grant_type' => 'client_credentials'];

        foreach ($keys as $key) {
            if (! array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            } else {
                $params[$key] = $config[$key];
            }
        }
        $this->config['params'] = ['form_params' => $params];

        return $this->config['params']['form_params'];
    }

    private function getBasicToken()
    {
        $config = $this->getConfigFile();
        if(! array_key_exists('basic_token', $config)) {
            throw new InvalidArgumentException('Missing configuration key basic_token.');
        }
        $this->config['tokens']['basic_token']['headers'] = ['Authorization' => 'Basic '.$config['basic_token']];

        return $this->config['tokens']['basic_token']['headers'];
    }

    private function getConfigFile()
    {
        return config('hotmart');
    }
}
