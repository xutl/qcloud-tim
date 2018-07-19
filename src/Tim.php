<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;

use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Requests\AccountImportRequest;
use XuTL\QCloud\Tim\Requests\AccountLoginKickRequest;
use XuTL\QCloud\Tim\Requests\MultiAccountImportRequest;
use XuTL\QCloud\Tim\Responses\MultiAccountImportResponse;

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

    /**
     * 导入账户
     * @param AccountImportRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function accountImport(AccountImportRequest $request)
    {
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 批量导入账户
     * @param MultiAccountImportRequest $request
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function multiAccountImport(MultiAccountImportRequest $request)
    {
        $response = new MultiAccountImportResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 帐号登录态失效接口
     * @param string $identifier
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function accountLoginKick($identifier)
    {
        $request = new AccountLoginKickRequest($identifier);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }
}
