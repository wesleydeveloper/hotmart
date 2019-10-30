<?php
/**
 * Class Hotmart
 * @package Wesleydeveloper\Hotmart
 * @author Wesley Silva <wesley_silva@outlook.com>
 */


namespace Wesleydeveloper\Hotmart;


use GuzzleHttp\Client;
use Wesleydeveloper\Hotmart\Support\Connect;

class Hotmart extends Connect
{
    private const BASE_URI = 'https://api-hot-connect.hotmart.com/';

    private $client;

    private $params;

    public function __construct($config = null)
    {
        parent::__construct($config);
        $this->params = ['headers' => ['Authorization' => "Bearer {$this->getConfig()->getAccessToken()}"]];
        $this->client = new Client(['base_uri' => self::BASE_URI]);
    }

    // Report

    /**
     * Required parameters: startDate, endDate.
     * Optional parameters: productId, statusType, email, transaction, transactionStatus, buyerName, cpf, salesNature, paymentEngine, showNotAccessed, paymentType, source, affiliateName, offerKey, orderBy, format page and rows.
     * @param array|null $params
     * @return mixed
     */
    public function getHistory(array $params)
    {
        $keys = ['startDate', 'endDate'];
        $params = array_filter($params);
        foreach ($keys as $key) {
            if (! array_key_exists($key, $params)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }
        $this->params['query'] = $params;
        $request = $this->client->get('/reports/rest/v2/history', $this->params);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
    }

    /**
     * Required parameters: startDate, endDate and transactionStatus.
     * Optional parameters: productId, buyerEmail, transaction, page and rows.
     * @param array $params
     * @return mixed
     */
    public function getPurchaseDetails(array $params)
    {
        $keys = ['startDate', 'endDate', 'transactionStatus'];
        $params = array_filter($params);
        foreach ($keys as $key) {
            if (! array_key_exists($key, $params)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }
        $this->params['query'] = $params;
        $request = $this->client->get('/reports/rest/v2/purchaseDetails', $this->params);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
    }

    // Affiliation

    /**
     * @return mixed
     */
    public function getHotlinks()
    {
        $request = $this->client->get('/affiliation/rest/v2/', $this->params);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
    }

    // Product

    /**
     * @param int $productId
     * @return mixed
     */
    public function getProduct(int $productId)
    {
        $request = $this->client->get("/product/rest/v2/{$productId}", $this->params);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function getOffersOfProduct(int $productId)
    {
        $request = $this->client->get("/product/rest/v2/{$productId}/offers/", $this->params);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
    }

    // Subscription

    /**
     * Optional parameters: page and rows.
     * @param array|null $params
     * @return mixed
     */
    public function getSubscription(array $params = null, bool $var)
    {
        if (is_array($params)) {
            $params = array_filter($params);
            $this->params['query'] = $params;
        }
        $request = $this->client->get('/subscriber/rest/v2', $this->params);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
    }

    // User

    /**
     * Optional parameters: id and ucode.
     * @param array|null $params
     * @return mixed
     */
    public function getUser(array $params = null)
    {
        if (is_array($params)) {
            $params = array_filter($params);
            $this->params['query'] = $params;
        }
        $request = $this->client->get('/user/rest/v2', $this->params);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getLoggedUser()
    {
        $request = $this->client->get('/user/rest/v2/me', $this->params);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
    }
}