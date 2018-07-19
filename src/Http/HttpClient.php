<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Http;

use XuTL\QCloud\Tim\Config;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\TransferException;

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
     * @var float
     */
    private $requestTimeout;

    /**
     * @var float
     */
    private $connectTimeout;

    /**
     * @var int AppId
     */
    private $appId;

    /**
     * @var string 账户类型
     */
    private $accountType;

    /**
     * @var string
     */
    protected $baseUri = 'https://console.tim.qq.com/';


    /**
     * HttpClient constructor.
     * @param string $appId
     * @param string $secretId
     * @param string $secretKey
     * @param Config|null $config
     */
    public function __construct($appId, $accountType, $secretKey, Config $config = null)
    {
        if ($config == null) {
            $config = new Config;
        }
        $this->appId = $appId;
        $this->accountType = $accountType;
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->baseUri,
            'defaults' => [
                'proxy' => $config->getProxy(),
                'expect' => $config->getExpectContinue()
            ]
        ]);
        $this->requestTimeout = $config->getRequestTimeout();
        $this->connectTimeout = $config->getConnectTimeout();
    }
}
