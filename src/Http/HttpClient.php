<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim\Http;

use XuTL\QCloud\Tim\AsyncCallback;
use XuTL\QCloud\Tim\Config;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\TransferException;
use XuTL\QCloud\Tim\Signature;

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
     * 签名实例
     * @var Signature
     */
    private $signature;

    /**
     * 账户管理员
     * @var string
     */
    private $administrator;

    /**
     * @var string
     */
    protected $baseUri = 'https://console.tim.qq.com/';

    /**
     * HttpClient constructor.
     * @param string $appId
     * @param string $accountType
     * @param Signature $signature
     * @param string $administrator 管理员账户
     * @param Config|null $config
     */
    public function __construct($appId, $accountType, $signature, $administrator, Config $config = null)
    {
        if ($config == null) {
            $config = new Config;
        }
        $this->appId = $appId;
        $this->accountType = $accountType;
        $this->signature = $signature;
        $this->administrator = $administrator;
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

    /**
     * 编译请求参数
     * @param BaseRequest $request
     * @return array
     */
    public function buildRequestBody(BaseRequest &$request)
    {
        $params = [
            'identifier' => $this->administrator,
            'sdkappid' => $this->appId,
            'random' => uniqid(),
            'contenttype' => 'json',
            'usersig' => $this->im->signature->make($this->administrator)
        ];
        $url = $this->composeUrl($this->baseUri, $params);
        $event->request->setUrl($url);

        return $params;
    }


    /**
     * 发送异步请求
     * @param BaseRequest $request
     * @param BaseResponse $response
     * @param AsyncCallback|NULL $callback
     * @return Promise
     */
    public function sendRequestAsync(BaseRequest $request, BaseResponse &$response, AsyncCallback $callback = null)
    {
        $promise = $this->sendRequestAsyncInternal($request, $response, $callback);
        return new Promise($promise, $response);
    }

    /**
     * 发送同步请求
     * @param BaseRequest $request
     * @param BaseResponse $response
     * @return BaseResponse
     */
    public function sendRequest(BaseRequest $request, BaseResponse &$response)
    {
        $promise = $this->sendRequestAsync($request, $response);
        return $promise->wait();
    }

    /**
     * 内部方法，发送请求
     * @param BaseRequest $request
     * @param BaseResponse $response
     * @param AsyncCallback|null $callback
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function sendRequestAsyncInternal(BaseRequest &$request, BaseResponse &$response, AsyncCallback $callback = null)
    {
        $options = ['exceptions' => false, 'http_errors' => false];
        $options['query'] = [
            'identifier' => $this->administrator,
            'sdkappid' => $this->appId,
            'random' => uniqid(),
            'contenttype' => 'json',
            'usersig' => $this->signature->make($this->administrator)
        ];
        $options['form_params'] = $this->buildRequestBody($request);
        $options['timeout'] = $this->requestTimeout;
        $options['connect_timeout'] = $this->connectTimeout;
        $request = new Request('POST', $this->requestPath);
        try {
            if ($callback != null) {
                return $this->client->sendAsync($request, $options)->then(
                    function (ResponseInterface $res) use (&$response, $callback) {
                        try {
                            $response->unwrapResponse($res);
                            $callback->onSucceed($response);
                        } catch (CMQException $e) {
                            $callback->onFailed($e);
                        }
                    }
                );
            } else {
                return $this->client->sendAsync($request, $options);
            }
        } catch (TransferException $e) {
            $message = $e->getMessage();
            if ($e->hasResponse()) {
                $message = $e->getResponse()->getBody();
            }
            throw new CMQException($message, $e->getCode());
        }
    }
}
