<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;

use XuTL\QCloud\Tim\Http\HttpClient;

/**
 * Class Tim
 * @package XuTL\QCloud\Tim
 */
class Tim
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * 签名实例
     * @var Signature
     */
    private $signature;

    /**
     * 私钥
     * @var string
     */
    private $privateKey;

    /**
     * 公钥
     * @var string
     */
    private $publicKey;

    /**
     * @var string 账户类型
     */
    private $accountType;

    /**
     * 账户管理员
     * @var string
     */
    private $administrator;

    /**
     * Client constructor.
     * @param string $appId SdkAppid
     * @param string $accountType 账户类型
     * @param string $privateKey 私钥
     * @param string $publicKey 公钥
     * @param string $administrator 管理员账户
     * @param Config|null $config 配置
     */
    public function __construct($appId, $accountType, $privateKey, $publicKey, $administrator, Config $config = NULL)
    {
        $this->signature = new Signature($appId, $accountType, $privateKey, $publicKey);
        $this->client = new HttpClient($appId, $accountType, $this->signature, $administrator, $config);
        $this->accountType = $accountType;
        $this->administrator = $administrator;
    }
}
