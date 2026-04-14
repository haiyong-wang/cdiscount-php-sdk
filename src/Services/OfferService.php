<?php

namespace Exewen\Cdiscount\Services;

use Exewen\Cdiscount\Contract\OfferInterface;
use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;

class OfferService implements OfferInterface
{
    private $httpClient;
    private $driver;

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('cdiscount.channel_api');
    }

    /**
     * 获取报价列表
     * @param array $params
     * @param array $header
     * @return array
     */
    public function getOffers(array $params, array $header = [])
    {
        $response = $this->httpClient->get($this->driver, '/seller/v2/offers', $params, $header);
        $result   = $response->getBody()->getContents();
        $result   = json_decode($result, true);
        $link     = $response->getHeaderLine('Link');
        return compact('result', 'link');
    }

    public function getProducts(array $params, array $header = [])
    {
        $response = $this->httpClient->get($this->driver, '/seller/v2/products', $params, $header);
        $result   = $response->getBody()->getContents();
        $result   = json_decode($result, true);
        $link     = $response->getHeaderLine('Link');
        return compact('result', 'link');
    }
}
