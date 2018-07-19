<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace XuTL\QCloud\Tim;

use XuTL\QCloud\Tim\Http\BaseResponse;
use XuTL\QCloud\Tim\Http\HttpClient;
use XuTL\QCloud\Tim\Model\AccountProfile;
use XuTL\QCloud\Tim\Requests\GetAccountProfileRequest;
use XuTL\QCloud\Tim\Requests\AccountLoginKickRequest;
use XuTL\QCloud\Tim\Requests\AccountStateRequest;
use XuTL\QCloud\Tim\Requests\SetAccountProfileRequest;
use XuTL\QCloud\Tim\Responses\AccountStateResponse;
use XuTL\QCloud\Tim\Responses\GetAccountProfileResponse;
use XuTL\QCloud\Tim\Responses\SetAccountProfileResponse;

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
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function kick()
    {
        $request = new AccountLoginKickRequest($this->identifier);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 查询账户在线状态
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function state()
    {
        $request = new AccountStateRequest([$this->identifier]);
        $response = new AccountStateResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 拉取用户资料
     * @return BaseResponse|GetAccountProfileResponse
     * @throws Exception\TIMException
     */
    public function getProfile()
    {
        $request = new GetAccountProfileRequest([$this->identifier]);
        $response = new GetAccountProfileResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 设置用户资料
     * @param AccountProfile $profile
     * @return BaseResponse|SetAccountProfileResponse
     * @throws Exception\TIMException
     */
    public function setProfile(AccountProfile $profile)
    {
        $request = new SetAccountProfileRequest($this->identifier);
        $request->setProfileItem($profile);
        $response = new SetAccountProfileResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 设置全局禁言
     */
    public function setNoSpeaking()
    {

    }

    /**
     * 获取全局禁言
     */
    public function getNoSpeaking()
    {

    }
}
