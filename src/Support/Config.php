<?php
/**
 * Class Config
 * @package Wesleydeveloper\Hotmart\Support
 * @author Wesley Silva <wesley_silva@outlook.com>
 */


namespace Wesleydeveloper\Hotmart\Support;


class Config
{
    protected $access_token;
    protected $client_id;
    protected $client_secret;
    protected $basic;
    private $data;

    /**
     * @param string|null $client_id
     * @param string|null $client_secret
     * @param string|null $basic
     */
    public function __construct($client_id = null, $client_secret = null, $basic = null)
    {
        $this->setClientId($client_id);
        $this->setClientSecret($client_secret);
        $this->setBasic($basic);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param object|array|string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken($access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @return string
     */
    public function getBasic()
    {
        return $this->basic;
    }

    /**
     * @param string $basic
     */
    public function setBasic($basic): void
    {
        $this->basic = $basic;
    }

    /**
     * @param string $client_id
     */
    public function setClientId($client_id): void
    {
        $this->client_id = $client_id;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * @param string $client_secret
     */
    public function setClientSecret($client_secret): void
    {
        $this->client_secret = $client_secret;
    }


}