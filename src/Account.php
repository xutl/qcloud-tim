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
use XuTL\QCloud\Tim\Requests\GetJoinedGroupListRequest;
use XuTL\QCloud\Tim\Requests\GetNoSpeakingRequest;
use XuTL\QCloud\Tim\Requests\SetAccountProfileRequest;
use XuTL\QCloud\Tim\Requests\SetC2CNoSpeakingRequest;
use XuTL\QCloud\Tim\Requests\SetGroupNoSpeakingRequest;
use XuTL\QCloud\Tim\Requests\SetNoSpeakingRequest;
use XuTL\QCloud\Tim\Responses\AccountStateResponse;
use XuTL\QCloud\Tim\Responses\GetAccountProfileResponse;
use XuTL\QCloud\Tim\Responses\GetJoinedGroupListResponse;
use XuTL\QCloud\Tim\Responses\GetNoSpeakingBaseResponse;
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
     * 获取用户所加入的群组
     * @param int $limit
     * @param int $offset
     * @param string $groupType
     * @param array $responseFilter
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function getJoinedGroupList($limit, $offset, $groupType = null, $responseFilter = null)
    {
        $request = new GetJoinedGroupListRequest($this->identifier, $limit, $offset, $groupType, $responseFilter);
        $response = new GetJoinedGroupListResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 设置全局圈子禁言
     * @param int $noSpeakingTime
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function setGroupNoSpeaking($noSpeakingTime)
    {
        $request = new SetGroupNoSpeakingRequest($this->identifier, $noSpeakingTime);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 设置C2C禁言
     * @param int $noSpeakingTime
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function setC2CNoSpeaking($noSpeakingTime)
    {
        $request = new SetC2CNoSpeakingRequest($this->identifier, $noSpeakingTime);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 设置全局禁言
     * @param int $C2CNoSpeaking
     * @param int $groupNoSpeaking
     * @return BaseResponse
     * @throws Exception\TIMException
     */
    public function setNoSpeaking($C2CNoSpeaking, $groupNoSpeaking)
    {
        $request = new SetNoSpeakingRequest($this->identifier, $C2CNoSpeaking, $groupNoSpeaking);
        $response = new BaseResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 获取全局禁言
     */
    public function getNoSpeaking()
    {
        $request = new GetNoSpeakingRequest($this->identifier);
        $response = new GetNoSpeakingBaseResponse();
        return $this->client->sendRequest($request, $response);
    }
}
