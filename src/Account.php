<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;

use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Requests\AccountLoginKickRequest;
use XuTL\QCloud\Tim\Requests\AccountStateRequest;
use XuTL\QCloud\Tim\Responses\AccountStateResponse;

/**
 * 账户操作
 * @package XuTL\QCloud\Tim
 */
class Account
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * 用户账号标识
     * @var string
     */
    protected $identifier;

    /**
     * Account constructor.
     * @param HttpClient $client
     * @param string $identifier
     */
    public function __construct(HttpClient $client, $identifier)
    {
        $this->client = $client;
        $this->identifier = $identifier;
    }

    /**
     * 帐号登录态失效接口
     * @param string $identifier
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function kick($identifier)
    {
        $request = new AccountLoginKickRequest($identifier);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 查询账户在线状态
     * @param array|string $accounts
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function state($accounts)
    {
        $accounts = is_array($accounts) ? $accounts : [$accounts];
        $request = new AccountStateRequest($accounts);
        $response = new AccountStateResponse();
        return $this->client->sendRequest($request, $response);
    }
}
