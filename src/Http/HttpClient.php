<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Http;

use XuTL\QCloud\Tim\Config;

/**
 * Class HttpClient
 * @package XuTL\QCloud\Tim\Http
 */
class HttpClient
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * HttpClient constructor.
     * @param string $endPoint
     * @param string $secretId
     * @param string $secretKey
     * @param Config|null $config
     */
    public function __construct($endPoint, $secretId, $secretKey, Config $config = null)
    {
        if ($config == null) {
            $config = new Config;
        }
        $this->endPoint = $endPoint;
        $this->secretId = $secretId;
        $this->secretKey = $secretKey;
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $endPoint,
            'defaults' => [
                'proxy' => $config->getProxy(),
                'expect' => $config->getExpectContinue()
            ]
        ]);
        $this->requestTimeout = $config->getRequestTimeout();
        $this->connectTimeout = $config->getConnectTimeout();
    }
}
